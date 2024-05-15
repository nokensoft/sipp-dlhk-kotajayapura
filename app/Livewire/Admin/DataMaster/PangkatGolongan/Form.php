<?php

namespace App\Livewire\Admin\DataMaster\PangkatGolongan;

use App\Models\PangkatGolongan;
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
    public $pangkatGolongan = [];
    public bool $isDisabled = false;

    #[Url(history: true)]
    public string $id = '';

    #[Url(history: true)]
    public string $menu = '';
    public $user;

    protected $rules = [
        'pangkatGolongan.pangkat_golongan' => 'required',
        'pangkatGolongan.keterangan' => 'nullable',
    ];

    protected $messages = [
        'pangkatGolongan.pangkat_golongan.required' => 'Nama bidang tidak boleh kosong',
    ];

    public function mount(): void
    {
        $this->user = Auth::user();
        $this->loadPangkatGolongan($this->id, $this->menu);
        if(!$this->user->hasAnyPermission(['edit'])){
            $this->isDisabled = true;
        }
        // if ($this->id != ''){
        //     $this->bidang = PangkatGolongan::query()->find($this->id)?->toArray();
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
            $this->redirectRoute('pangkatGolongan');
            return;
        }
        $this->validate();

        try {
            DB::beginTransaction();

            PangkatGolongan::updateOrCreate(
                [
                    'id' => $this->pangkatGolongan['id'] ?? null
                ],
                $this->pangkatGolongan
            );

            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            Log::info('Error: '. $e->getMessage());
            return;
        }

        $message = 'tambahkan data baru!';
        if (isset($this->pangkatGolongan['id'])) {
            $message = 'ubah data!';
        }

        session()->flash('success', $message);
        $this->redirectRoute('pangkatGolongan');
    }

    #[On('load-pangkat-golongan')]
    public function loadPangkatGolongan($id, $menu = 'view'):void
    {
        $this->menu = $menu;
        if ($this->id != ''){
            $this->pangkatGolongan = PangkatGolongan::query()->withTrashed()->find($id)?->toArray();
        }

        if($this->menu === 'view') $this->isDisabled = true;
    }

    public function render(): View
    {
        return view('livewire.admin.data-master.pangkat-golongan.form');
    }
}
