<?php

namespace App\Livewire\Admin\DataMaster\Tugas;

use App\Models\Tugas;
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
    public $tugas = [];
    public bool $isDisabled = false;

    #[Url(history: true)]
    public string $id = '';

    #[Url(history: true)]
    public string $menu = '';
    public $user;

    protected $rules = [
        'tugas.tugas' => 'required',
        'tugas.keterangan' => 'nullable',
    ];

    protected $messages = [
        'tugas.tugas.required' => 'Tugas tidak boleh kosong',
    ];

    public function mount(): void
    {
        $this->user = Auth::user();
        $this->loadTugas($this->id, $this->menu);
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
            $this->redirectRoute('tugas');
            return;
        }
        $this->validate();

        try {
            DB::beginTransaction();

            Tugas::updateOrCreate(
                [
                    'id' => $this->tugas['id'] ?? null
                ],
                $this->tugas
            );

            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            Log::info('Error: '. $e->getMessage());
            return;
        }

        $message = 'tambahkan data baru!';
        if (isset($this->tugas['id'])) {
            $message = 'ubah data!';
        }

        session()->flash('success', $message);
        $this->redirectRoute('tugas');
    }

    #[On('load-pangkat-golongan')]
    public function loadTugas($id, $menu = 'detail'):void
    {
        $this->menu = $menu;
        if ($this->id != ''){
            $this->tugas = Tugas::query()->withTrashed()->find($id)?->toArray();
        }

        if($this->menu === 'detail') $this->isDisabled = true;
    }

    public function render(): View
    {
        return view('livewire.admin.data-master.tugas.form');
    }
}
