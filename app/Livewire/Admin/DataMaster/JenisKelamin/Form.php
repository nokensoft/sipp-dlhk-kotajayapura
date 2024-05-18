<?php

namespace App\Livewire\Admin\DataMaster\JenisKelamin;

use App\Models\JenisKelamin;
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
    public $jenisKelamin = [];
    public bool $isDisabled = false;

    #[Url(history: true)]
    public string $id = '';

    #[Url(history: true)]
    public string $menu = '';
    public $user;

    protected $rules = [
        'jenisKelamin.jenis_kelamin' => 'required',
        'jenisKelamin.keterangan' => 'nullable',
    ];

    protected $messages = [
        'jenisKelamin.jenis_kelamin.required' => 'Jenis kelamin tidak boleh kosong',
    ];

    public function mount(): void
    {
        $this->user = Auth::user();
        $this->loadJenisKelamin($this->id, $this->menu);
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
            $this->redirectRoute('jenisKelamin');
            return;
        }
        $this->validate();

        try {
            DB::beginTransaction();

            JenisKelamin::updateOrCreate(
                [
                    'id' => $this->jenisKelamin['id'] ?? null
                ],
                $this->jenisKelamin
            );

            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            Log::info('Error: '. $e->getMessage());
            return;
        }

        $message = 'tambahkan data baru!';
        if (isset($this->jenisKelamin['id'])) {
            $message = 'ubah data!';
        }

        session()->flash('success', $message);
        $this->redirectRoute('jenisKelamin');
    }

    #[On('load-jenis-kelamin')]
    public function loadJenisKelamin($id, $menu = 'view'):void
    {
        $this->menu = $menu;
        if ($this->id != ''){
            $this->jenisKelamin = JenisKelamin::query()->withTrashed()->find($id)?->toArray();
        }

        if($this->menu === 'view') $this->isDisabled = true;
    }

    public function render(): View
    {
        return view('livewire.admin.data-master.jenis-kelamin.form');
    }
}
