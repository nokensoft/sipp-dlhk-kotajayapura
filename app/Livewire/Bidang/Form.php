<?php

namespace App\Livewire\Bidang;

use App\Models\Bidang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Exception;
use Livewire\WithFileUploads;

class Form extends Component
{
    use WithFileUploads;
    public $bidang = [];
    public bool $isDisabled = false;

    #[Url(history: true)]
    public string $id = '';

    #[Url(history: true)]
    public string $menu = '';
    public $user;

    protected $rules = [
        'bidang.bidang' => 'required',
        'bidang.keterangan' => 'nullable',
        'bidang.icon' => 'nullable'
    ];

    protected $messages = [
        'bidang.bidang.required' => 'Nama bidang tidak boleh kosong',
    ];

    public function mount(): void
    {
        $this->user = Auth::user();
        $this->loadBidang($this->id, $this->menu);
        if(!$this->user->hasAnyPermission(['edit'])){
            $this->isDisabled = true;
        }
        // if ($this->id != ''){
        //     $this->bidang = Bidang::query()->find($this->id)?->toArray();
        // }
    }

    #[On('refresh')]
    public function refreshIsDisabled($isDisabled):void
    {
        $this->isDisabled = $isDisabled;
    }

    public function save(): void
    {
        if (!$this->user->hasAnyPermission(['edit'])){
            session()->flash('error', 'Maaf anda tidak memiliki hak akses!');
            $this->redirectRoute('bidang');
            return;
        }
        $this->fileChecking();
        $this->validate();

        try {
            DB::beginTransaction();

            if (isset($this->bidang['icon']) && $this->bidang['icon'] != '' && !is_string($this->bidang['icon'])) {
                $this->bidang['icon'] =  $this->uploadFile('icon_',$this->bidang['icon']);
            }

            Bidang::updateOrCreate(
                [
                    'id' => $this->bidang['id'] ?? null
                ],
                $this->bidang
            );

            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            Log::info('Error: '. $e->getMessage());
            return;
        }

        $message = 'tambahkan data baru!';
        if (isset($this->bidang['id'])) {
            $message = 'ubah data!';
        }

        session()->flash('success', $message);
        $this->redirectRoute('bidang');
    }

    #[On('load-bidang')]
    public function loadBidang($id, $menu = 'view'):void
    {
        $this->menu = $menu;
        if ($this->id != ''){
            $this->bidang = Bidang::query()->withTrashed()->find($id)?->toArray();
        }

        if($this->menu === 'view') $this->isDisabled = true;
    }

    private function fileChecking(): void
    {
        if(isset($this->bidang['icon']) && is_string($this->bidang['icon'])){
            $this->rules['bidang.icon'] = 'nullable';
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
        $file->storeAs('public/files', $fileName);
        return 'files/'.$fileName;
    }

    public function render(): View
    {
        return view('livewire.bidang.form');
    }
}
