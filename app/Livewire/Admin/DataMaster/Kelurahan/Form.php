<?php

namespace App\Livewire\Admin\DataMaster\Kelurahan;

use App\Models\Kelurahan;
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
    public $kelurahan = [];
    public bool $isDisabled = false;

    #[Url(history: true)]
    public string $id = '';

    #[Url(history: true)]
    public string $menu = '';
    public $user;

    protected $rules = [
        'kelurahan.kelurahan' => 'required',
        'kelurahan.keterangan' => 'nullable',
    ];

    protected $messages = [
        'kelurahan.kelurahan.required' => 'Kelurahan tidak boleh kosong',
    ];

    public function mount(): void
    {
        $this->user = Auth::user();
        $this->loadKelurahan($this->id, $this->menu);
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
            $this->redirectRoute('kelurahan');
            return;
        }
        $this->validate();

        try {
            DB::beginTransaction();

            Kelurahan::updateOrCreate(
                [
                    'id' => $this->kelurahan['id'] ?? null
                ],
                $this->kelurahan
            );

            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            Log::info('Error: '. $e->getMessage());
            return;
        }

        $message = 'tambahkan data baru!';
        if (isset($this->kelurahan['id'])) {
            $message = 'ubah data!';
        }

        session()->flash('success', $message);
        $this->redirectRoute('kelurahan');
    }

    #[On('load-kelurahan')]
    public function loadKelurahan($id, $menu = 'view'):void
    {
        $this->menu = $menu;
        if ($this->id != ''){
            $this->kelurahan = Kelurahan::query()->withTrashed()->find($id)?->toArray();
        }

        if($this->menu === 'view') $this->isDisabled = true;
    }

    public function render(): View
    {
        return view('livewire.admin.data-master.kelurahan.form');
    }
}
