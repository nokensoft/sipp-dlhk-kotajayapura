<?php

namespace App\Livewire\Admin\DataMaster\Distrik;

use App\Models\Distrik;
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
    public $distrik = [];
    public bool $isDisabled = false;

    #[Url(history: true)]
    public string $id = '';

    #[Url(history: true)]
    public string $menu = '';
    public $user;

    protected $rules = [
        'distrik.distrik' => 'required',
        'distrik.keterangan' => 'nullable',
        'distrik.geojson' => 'nullable'
    ];

    protected $messages = [
        'distrik.distrik.required' => 'Distrik tidak boleh kosong',
    ];

    public function mount(): void
    {
        $this->user = Auth::user();
        $this->loadDistrik($this->id, $this->menu);
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
            $this->redirectRoute('distrik');
            return;
        }
        if(isset($this->distrik['geojson'])) $this->distrik['geojson'] = json_encode($this->distrik['geojson']);
        $this->validate();

        try {
            DB::beginTransaction();

            Distrik::updateOrCreate(
                [
                    'id' => $this->distrik['id'] ?? null
                ],
                $this->distrik
            );

            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            Log::info('Error: '. $e->getMessage());
            return;
        }

        $message = 'tambahkan data baru!';
        if (isset($this->distrik['id'])) {
            $message = 'ubah data!';
        }

        session()->flash('success', $message);
        $this->redirectRoute('distrik');
    }

    #[On('load-distrik')]
    public function loadDistrik($id, $menu = 'view'):void
    {
        $this->menu = $menu;
        if ($this->id != ''){
            $this->distrik = Distrik::query()->withTrashed()->find($id)?->toArray();
            $this->distrik['geojson'] = json_decode($this->distrik['geojson']);
        }

        if($this->menu === 'view') $this->isDisabled = true;
    }

    public function render(): View
    {
        return view('livewire.admin.data-master.distrik.form');
    }
}
