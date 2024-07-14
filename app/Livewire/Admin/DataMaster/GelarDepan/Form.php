<?php

namespace App\Livewire\Admin\DataMaster\GelarDepan;

use App\Models\GelarDepan;
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
    public $gelarDepan = [];
    public bool $isDisabled = false;

    #[Url(history: true)]
    public string $id = '';

    #[Url(history: true)]
    public string $menu = '';
    public $user;

    protected $rules = [
        'gelarDepan.gelar_depan' => 'required',
        'gelarDepan.keterangan' => 'nullable',
    ];

    protected $messages = [
        'gelarDepan.gelar_depan.required' => 'Gelar depan tidak boleh kosong',
    ];

    public function mount(): void
    {
        $this->user = Auth::user();
        $this->loadGelarDepan($this->id, $this->menu);
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
            $this->redirectRoute('gelarDepan');
            return;
        }
        $this->validate();

        try {
            DB::beginTransaction();

            GelarDepan::updateOrCreate(
                [
                    'id' => $this->gelarDepan['id'] ?? null
                ],
                $this->gelarDepan
            );

            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            Log::info('Error: '. $e->getMessage());
            return;
        }

        $message = 'tambahkan data baru!';
        if (isset($this->gelarDepan['id'])) {
            $message = 'ubah data!';
        }

        session()->flash('success', $message);
        $this->redirectRoute('gelarDepan');
    }

    #[On('load-gelar-depan')]
    public function loadGelarDepan($id, $menu = 'detail'):void
    {
        $this->menu = $menu;
        if ($this->id != ''){
            $this->gelarDepan = GelarDepan::query()->withTrashed()->find($id)?->toArray();
        }

        if($this->menu === 'detail') $this->isDisabled = true;
    }

    public function render(): View
    {
        return view('livewire.admin.data-master.gelar-depan.form');
    }
}
