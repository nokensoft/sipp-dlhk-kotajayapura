<?php

namespace App\Livewire\Admin\DataMaster\SertifikatKeahlian;

use App\Models\SertifikatKeahlian;
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
    public $sertifikatKeahlian = [];
    public bool $isDisabled = false;

    #[Url(history: true)]
    public string $id = '';

    #[Url(history: true)]
    public string $menu = '';
    public $user;

    protected $rules = [
        'sertifikatKeahlian.sertifikat_keahlian' => 'required',
        'sertifikatKeahlian.keterangan' => 'nullable',
    ];

    protected $messages = [
        'sertifikatKeahlian.sertifikat_keahlian.required' => 'Sertifikat keahlian tidak boleh kosong',
    ];

    public function mount(): void
    {
        $this->user = Auth::user();
        $this->loadSertifikatKeahlian($this->id, $this->menu);
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
            $this->redirectRoute('sertifikatKeahlian');
            return;
        }
        $this->validate();

        try {
            DB::beginTransaction();

            SertifikatKeahlian::updateOrCreate(
                [
                    'id' => $this->sertifikatKeahlian['id'] ?? null
                ],
                $this->sertifikatKeahlian
            );

            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            Log::info('Error: '. $e->getMessage());
            return;
        }

        $message = 'tambahkan data baru!';
        if (isset($this->sertifikatKeahlian['id'])) {
            $message = 'ubah data!';
        }

        session()->flash('success', $message);
        $this->redirectRoute('sertifikatKeahlian');
    }

    #[On('load-pangkat-golongan')]
    public function loadSertifikatKeahlian($id, $menu = 'detail'):void
    {
        $this->menu = $menu;
        if ($this->id != ''){
            $this->sertifikatKeahlian = SertifikatKeahlian::query()->withTrashed()->find($id)?->toArray();
        }

        if($this->menu === 'detail') $this->isDisabled = true;
    }

    public function render(): View
    {
        return view('livewire.admin.data-master.sertifikat-keahlian.form');
    }
}
