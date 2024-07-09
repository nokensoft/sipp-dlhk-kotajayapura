<?php

namespace App\Livewire\Kontrak;

use App\Models\Kontrak;
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
    public $kontrak = [];
    public bool $isDisabled = false;

    #[Url(history: true)]
    public string $id = '';

    #[Url(history: true)]
    public string $menu = '';
    public $user;

    protected $rules = [
        'kontrak.kontrak' => 'required',
        'kontrak.keterangan' => 'nullable',
        'kontrak.icon' => 'nullable'
    ];

    protected $messages = [
        'kontrak.kontrak.required' => 'Nama kontrak tidak boleh kosong',
    ];

    public function mount(): void
    {
        $this->user = Auth::user();
        $this->loadKontrak($this->id, $this->menu);
        if(!$this->user->hasAnyPermission(['edit'])){
            $this->isDisabled = true;
        }
        // if ($this->id != ''){
        //     $this->kontrak = Kontrak::query()->find($this->id)?->toArray();
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
            $this->redirectRoute('kontrak');
            return;
        }
        $this->fileChecking();
        $this->validate();

        try {
            DB::beginTransaction();

            if (isset($this->kontrak['icon']) && $this->kontrak['icon'] != '' && !is_string($this->kontrak['icon'])) {
                $this->kontrak['icon'] =  $this->uploadFile('icon_',$this->kontrak['icon']);
            }

            Kontrak::updateOrCreate(
                [
                    'id' => $this->kontrak['id'] ?? null
                ],
                $this->kontrak
            );

            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            Log::info('Error: '. $e->getMessage());
            return;
        }

        $message = 'tambahkan data baru!';
        if (isset($this->kontrak['id'])) {
            $message = 'ubah data!';
        }

        session()->flash('success', $message);
        $this->redirectRoute('kontrak');
    }

    #[On('load-kontrak')]
    public function loadKontrak($id, $menu = 'view'):void
    {
        $this->menu = $menu;
        if ($this->id != ''){
            $this->kontrak = Kontrak::query()->withTrashed()->find($id)?->toArray();
        }

        if($this->menu === 'view') $this->isDisabled = true;
    }

    private function fileChecking(): void
    {
        if(isset($this->kontrak['icon']) && is_string($this->kontrak['icon'])){
            $this->rules['kontrak.icon'] = 'nullable';
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
        return view('livewire.kontrak.form');
    }
}
