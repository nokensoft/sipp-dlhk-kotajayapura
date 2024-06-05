<?php

namespace App\Livewire\Laporan;

use App\Models\Laporan;
use App\Models\LaporanDetail;
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
    public $laporanDetail = [];
    public string $segment = '';
    public string $route = 'laporanKepalaDinas';
    public $listOption = [];

    #[Url(history: true)]
    public string $id = '';

    #[Url(history: true)]
    public string $menu = '';

    protected $rules = [
        'laporan.laporan' => 'required',
        'laporan.catatan' => 'nullable',
        'laporan.file' => 'nullable',
        'laporan.tanggal' => 'nullable',
    ];

    protected $messages = [
        'laporan.laporan.required' => 'Judul laporan tidak boleh kosong',
    ];

    public function mount(): void
    {
        $this->user = auth()->user();
        $this->loadLaporan($this->id, $this->menu);
        $this->listOption = ['kepaladinas', 'kepalabidang', 'kepalaseksi'];
    }

    #[On('refresh')]
    public function refreshIsDisabled($isDisabled):void
    {
        $this->isDisabled = $isDisabled;
    }

    public function save(): void
    {
        $user = auth()->user();
        if ($this->segment === 'kepalabidang'){
            $this->route = 'laporanKepalaBidang';
        }elseif($this->segment === 'kepalaSeksi'){
            $this->route = 'laporanKepalaSeksi';
        }
        if (!$user->hasRole([$this->segment,'adminmaster'])){
            session()->flash('error', 'Maaf anda tidak memiliki hak akses!');
            $this->redirectRoute( $this->route );
            return;
        }
        $this->fileChecking();
        $this->validate();
        try {
            DB::beginTransaction();
            if (isset($this->laporan['file']) && $this->laporan['file'] != '' && !is_string($this->laporan['file'])) {
                $this->laporan['file'] =  $this->uploadFile($this->laporan['file'].'_file_',$this->laporan['file']);
            }
            $this->laporan['user_id'] = $this->user['id'];
            $laporan = Laporan::updateOrCreate(
                [
                    'id' => $this->laporan['id'] ?? null
                ],
                $this->laporan
            );

            if(isset($this->laporan['id'])){
                LaporanDetail::query()->where(['laporan_id' => $this->laporan['id'] ?? null])->whereNotIn('kepada', $this->laporanDetail)->each(function ($data){
                    $data->delete();
                });
            }

            $laporanDetail = LaporanDetail::query()->where(['laporan_id' => $this->laporan['id'] ?? null])->pluck('kepada')->toArray();

            $difference = array_filter($this->laporanDetail, function($value) use ($laporanDetail) {
                return !in_array($value, $laporanDetail);
            });

            foreach ($difference as $detail) {
                LaporanDetail::create(
                    [
                        'laporan_id' => $laporan->id ?? $this->laporan['id'] ?? null,
                        'kepada' => $detail
                    ]
                );
            }
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
        $route = 'laporanKepalaDinas';
        if($this->segment === 'kepalabidang'){
            $route = 'laporanKepalaBidang';
        }elseif ($this->segment === 'kepalaseksi'){
            $route = 'laporanKepalaSeksi';
        }
        $this->redirectRoute($route);
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
        $file->storeAs('public/files/laporan/', $fileName);
        return 'files/laporan'.$fileName;
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
            $this->laporanDetail = Laporan::query()->withTrashed()->find($id)->laporanDetail->pluck('kepada')->toArray();
        }
        if($this->menu === 'view')  $this->isDisabled = true;
    }

    #[On('delete-file')]
    public function deleteFile($name):void
    {
        $pathFile = storage_path('app/public/' . $this->laporan[$name] ?? '');
        if (file_exists($pathFile)) unlink($pathFile);
        $this->laporan[$name] = '';
        if(isset($this->laporan['id'])){
            Laporan::updateOrCreate(
                [
                    'id' => $this->laporan['id'] ?? null
                ],
                $this->laporan
            );
        }
    }

    public function render(): View
    {
        return view('livewire.laporan.form');
    }
}
