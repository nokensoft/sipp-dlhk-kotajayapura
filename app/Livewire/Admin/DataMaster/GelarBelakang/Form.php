<?php

namespace App\Livewire\Admin\DataMaster\GelarBelakang;

use App\Models\GelarBelakang;
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
    public $gelarBelakang = [];
    public bool $isDisabled = false;

    #[Url(history: true)]
    public string $id = '';

    #[Url(history: true)]
    public string $menu = '';
    public $user;

    protected $rules = [
        'gelarBelakang.gelar_belakang' => 'required',
        'gelarBelakang.keterangan' => 'nullable',
    ];

    protected $messages = [
        'gelarBelakang.gelar_belakang.required' => 'Gelar belakang tidak boleh kosong',
    ];

    public function mount(): void
    {
        $this->user = Auth::user();
        $this->loadGelarBelakang($this->id, $this->menu);
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
            $this->redirectRoute('gelarBelakang');
            return;
        }
        $this->validate();

        try {
            DB::beginTransaction();

            GelarBelakang::updateOrCreate(
                [
                    'id' => $this->gelarBelakang['id'] ?? null
                ],
                $this->gelarBelakang
            );

            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            Log::info('Error: '. $e->getMessage());
            return;
        }

        $message = 'tambahkan data baru!';
        if (isset($this->gelarBelakang['id'])) {
            $message = 'ubah data!';
        }

        session()->flash('success', $message);
        $this->redirectRoute('gelarBelakang');
    }

    #[On('load-gelar-belakang')]
    public function loadGelarBelakang($id, $menu = 'view'):void
    {
        $this->menu = $menu;
        if ($this->id != ''){
            $this->gelarBelakang = GelarBelakang::query()->withTrashed()->find($id)?->toArray();
        }

        if($this->menu === 'detail') $this->isDisabled = true;
    }

    public function render(): View
    {
        return view('livewire.admin.data-master.gelar-belakang.form');
    }
}
