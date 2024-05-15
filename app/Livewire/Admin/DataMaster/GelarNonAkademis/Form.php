<?php

namespace App\Livewire\Admin\DataMaster\GelarNonAkademis;

use App\Models\GelarNonAkademis;
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
    public $gelarNonAkademis = [];
    public bool $isDisabled = false;

    #[Url(history: true)]
    public string $id = '';

    #[Url(history: true)]
    public string $menu = '';
    public $user;

    protected $rules = [
        'gelarNonAkademis.gelar_non_akademis' => 'required',
        'gelarNonAkademis.keterangan' => 'nullable',
    ];

    protected $messages = [
        'gelarNonAkademis.gelar_non_akademis.required' => 'Gelar non akademis tidak boleh kosong',
    ];

    public function mount(): void
    {
        $this->user = Auth::user();
        $this->loadGelarNonAkademis($this->id, $this->menu);
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
            $this->redirectRoute('gelarNonAkademis');
            return;
        }
        $this->validate();

        try {
            DB::beginTransaction();

            GelarNonAkademis::updateOrCreate(
                [
                    'id' => $this->gelarNonAkademis['id'] ?? null
                ],
                $this->gelarNonAkademis
            );

            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            Log::info('Error: '. $e->getMessage());
            return;
        }

        $message = 'tambahkan data baru!';
        if (isset($this->gelarNonAkademis['id'])) {
            $message = 'ubah data!';
        }

        session()->flash('success', $message);
        $this->redirectRoute('gelarNonAkademis');
    }

    #[On('load-gelar-non-akademis')]
    public function loadGelarNonAkademis($id, $menu = 'view'):void
    {
        $this->menu = $menu;
        if ($this->id != ''){
            $this->gelarNonAkademis = GelarNonAkademis::query()->withTrashed()->find($id)?->toArray();
        }

        if($this->menu === 'view') $this->isDisabled = true;
    }

    public function render(): View
    {
        return view('livewire.admin.data-master.gelar-non-akademis.form');
    }
}
