<?php

namespace App\Livewire\Admin\DataMaster\Agama;

use App\Models\Agama;
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
    public $agama = [];
    public bool $isDisabled = false;

    #[Url(history: true)]
    public string $id = '';

    #[Url(history: true)]
    public string $menu = '';
    public $user;

    protected $rules = [
        'agama.agama' => 'required',
        'agama.keterangan' => 'nullable',
    ];

    protected $messages = [
        'agama.agama.required' => 'Agama tidak boleh kosong',
    ];

    public function mount(): void
    {
        $this->user = Auth::user();
        $this->loadAgama($this->id, $this->menu);
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
            $this->redirectRoute('agama');
            return;
        }
        $this->validate();

        try {
            DB::beginTransaction();

            Agama::updateOrCreate(
                [
                    'id' => $this->agama['id'] ?? null
                ],
                $this->agama
            );

            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            Log::info('Error: '. $e->getMessage());
            return;
        }

        $message = 'tambahkan data baru!';
        if (isset($this->agama['id'])) {
            $message = 'ubah data!';
        }

        session()->flash('success', $message);
        $this->redirectRoute('agama');
    }

    #[On('load-agama')]
    public function loadAgama($id, $menu = 'detail'):void
    {
        $this->menu = $menu;
        if ($this->id != ''){
            $this->agama = Agama::query()->withTrashed()->find($id)?->toArray();
        }

        if($this->menu === 'detail') $this->isDisabled = true;
    }

    public function render(): View
    {
        return view('livewire.admin.data-master.agama.form');
    }
}
