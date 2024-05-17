<?php

namespace App\Livewire\Admin\DataMaster\StatusPerkawinan;

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
use Exception;

class Form extends Component
{
    public $statusPerkawinan = [];
    public bool $isDisabled = false;

    #[Url(history: true)]
    public string $id = '';

    #[Url(history: true)]
    public string $menu = '';
    public $user;

    protected $rules = [
        'statusPerkawinan.status_perkawinan' => 'required',
        'statusPerkawinan.keterangan' => 'nullable',
    ];

    protected $messages = [
        'statusPerkawinan.status_perkawinan.required' => 'Status perkawinan tidak boleh kosong',
    ];

    public function mount(): void
    {
        $this->user = Auth::user();
        $this->loadStatusPerkawinan($this->id, $this->menu);
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
        if (!$this->user->hasAnyPermission(['edit'])){
            session()->flash('error', 'Maaf anda tidak memiliki hak akses!');
            $this->redirectRoute('statusPerkawinan');
            return;
        }
        $this->validate();

        try {
            DB::beginTransaction();

            StatusPerkawinan::updateOrCreate(
                [
                    'id' => $this->statusPerkawinan['id'] ?? null
                ],
                $this->statusPerkawinan
            );

            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            Log::info('Error: '. $e->getMessage());
            return;
        }

        $message = 'tambahkan data baru!';
        if (isset($this->statusPerkawinan['id'])) {
            $message = 'ubah data!';
        }

        session()->flash('success', $message);
        $this->redirectRoute('statusPerkawinan');
    }

    #[On('load-gelar-depan')]
    public function loadStatusPerkawinan($id, $menu = 'view'):void
    {
        $this->menu = $menu;
        if ($this->id != ''){
            $this->statusPerkawinan = StatusPerkawinan::query()->withTrashed()->find($id)?->toArray();
        }

        if($this->menu === 'view') $this->isDisabled = true;
    }

    public function render(): View
    {
        return view('livewire.admin.data-master.status-perkawinan.form');
    }
}
