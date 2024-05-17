<?php

namespace App\Livewire\Admin\DataMaster\Suku;

use App\Models\Suku;
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
    public $suku = [];
    public bool $isDisabled = false;

    #[Url(history: true)]
    public string $id = '';

    #[Url(history: true)]
    public string $menu = '';
    public $user;

    protected $rules = [
        'suku.suku' => 'required',
        'suku.keterangan' => 'nullable',
    ];

    protected $messages = [
        'suku.suku.required' => 'Suku tidak boleh kosong',
    ];

    public function mount(): void
    {
        $this->user = Auth::user();
        $this->loadSuku($this->id, $this->menu);
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
            $this->redirectRoute('suku');
            return;
        }
        $this->validate();

        try {
            DB::beginTransaction();

            Suku::updateOrCreate(
                [
                    'id' => $this->suku['id'] ?? null
                ],
                $this->suku
            );

            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            Log::info('Error: '. $e->getMessage());
            return;
        }

        $message = 'tambahkan data baru!';
        if (isset($this->suku['id'])) {
            $message = 'ubah data!';
        }

        session()->flash('success', $message);
        $this->redirectRoute('suku');
    }

    #[On('load-suku')]
    public function loadSuku($id, $menu = 'view'):void
    {
        $this->menu = $menu;
        if ($this->id != ''){
            $this->suku = Suku::query()->withTrashed()->find($id)?->toArray();
        }

        if($this->menu === 'view') $this->isDisabled = true;
    }

    public function render(): View
    {
        return view('livewire.admin.data-master.Suku.form');
    }
}
