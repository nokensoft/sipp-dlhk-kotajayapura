<?php

namespace App\Livewire\Laporan;

use App\Models\Laporan;
use App\Models\User;
use App\Models\StatusPerkawinan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;
use Exception;
use Spatie\Permission\Models\Role;

class Form extends Component
{
    use WithFileUploads;
    public $laporan = [];
    public $user = [];
    public $statusPerkawinan = [];
    // public $kategori = 'kepaladinas';
    public bool $isDisabled = false;
    public $userLogin;
    public $roles = [];
    public $role;

    #[Url(history: true)]
    public string $id = '';

    #[Url(history: true)]
    public string $menu = '';

    protected $rules = [
        'laporan.laporan' => 'required',
        'laporan.keterangan' => 'nullable',
        'laporan.kategori' => 'nullable',
        'laporan.file' => 'nullable',
        'pegawai.status_perkawinan_id' => 'nullable',
    ];

    protected $messages = [
        'laporan.laporan.required' => 'Judul laporan tidak boleh kosong',
    ];

    public function mount(): void
    {
        $this->user = Auth::user();
        $this->loadLaporan($this->id, $this->menu);
        
        

        if(!$this->user->hasAnyPermission(['edit'])){
            $this->isDisabled = true;
        }
    }

    #[On('refresh')]
    public function refreshIsDisabled($isDisabled):void
    {
        $this->isDisabled = $isDisabled;
    }

    public function save(): void
    {
        if (!$this->userLogin->hasAnyPermission(['edit'])){
            session()->flash('error', 'Maaf anda tidak memiliki hak akses!');
            $this->redirectRoute( request()->segment(2) );
            return;
        }
        if(isset($this->user['id'])){
            $this->rules['user.username'] = 'required|unique:users,username,'.$this->user['id'];
        }
        $this->fileChecking();
        $this->validate();
        try {
            DB::beginTransaction();
            $this->user['password'] = Hash::make($this->user['username']);
             $user = User::updateOrCreate(
                 [
                     'id' => $this->user['id'] ?? null
                 ],
                 $this->user
             );
            $user->assignRole($this->role);
             $this->laporan['user_id'] = $user->id;

             if (isset($this->laporan['file']) && $this->laporan['file'] != '' && !is_string($this->laporan['file'])) {
                 $this->laporan['file'] =  $this->uploadFile($this->laporan['nama_depan'].'_laporan_',$this->laporan['file']);
             }

            $this->laporan['is_asn'] = $this->isAsn;

             Laporan::updateOrCreate(
                 [
                     'id' => $this->laporan['id'] ?? null
                 ],
                 $this->laporan
             );
             DB::commit();
        }catch (Exception $e){
            DB::rollBack();
            Log::info('Error: '. $e->getMessage());
            return;
        }
        $message = 'tambahkan data baru!';
        if (isset($this->laporan['id'])){
            $message = 'ubah data!';
        }
        session()->flash('success', $message);
        if (isset($this->laporan['id'])){
            $this->redirectRoute( $this->isAsn ? 'asn' : 'nonAsn',['menu' => 'view', 'id' => $this->laporan['id'] ?? '']);
        }else{
            $this->redirectRoute( $this->isAsn ? 'asn' : 'nonAsn');
        }
    }

    private function fileChecking(): void
    {
        if(isset($this->laporan['file']) && is_string($this->laporan['file'])){
            $this->rules['laporan.file'] = 'nullable';
        }
    }

    private function microtime_float(): float
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }

    private function uploadFile($fileName, $file): string
    {
        $fileName = $fileName. '_'.$this->microtime_float().'.'.$file->extension();
        $file->storeAs('public/files/laporan', $fileName);
        return 'files/'.$fileName;
    }

    #[On('download')]
    public function download($img){
        $filepath = public_path('storage/').$img;
        return Response::download($filepath);
    }

    #[On('load-laporan')]
    public function loadLaporan($id, $menu = 'view'):void
    {
        $this->menu = $menu;
        $this->roles = Role::query()->get();
        if ($this->id != ''){
            $this->laporan = Laporan::query()->withTrashed()->find($id)?->toArray();
            $this->user = User::query()->with('roles')->find($this->laporan['user_id'] ?? null)?->toArray();
            $this->role = $this->user['roles'][0]['name'];
        }
        if($this->menu === 'view')  $this->isDisabled = true;
    }

    #[On('delete-file')]
    public function deleteFile($name):void
    {
        $pathFile = storage_path('app/public/' . $this->laporan[$name] ?? '');
        if (file_exists($pathFile)) unlink($pathFile);
        $this->laporan[$name] = '';
        Laporan::updateOrCreate(
            [
                'id' => $this->laporan['id'] ?? null
            ],
            $this->laporan
        );
    }

    public function render(): View
    {
        return view('livewire.laporan.form');
    }
}
