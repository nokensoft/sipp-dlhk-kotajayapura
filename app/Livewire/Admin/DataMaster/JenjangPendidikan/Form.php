<?php

namespace App\Livewire\Admin\DataMaster\JenjangPendidikan;

use App\Models\JenjangPendidikan;
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
    public $jenjangPendidikan = [];
    public bool $isDisabled = false;

    #[Url(history: true)]
    public string $id = '';

    #[Url(history: true)]
    public string $menu = '';
    public $user;

    protected $rules = [
        'jenjangPendidikan.jenjang_pendidikan' => 'required',
        'jenjangPendidikan.keterangan' => 'nullable',
    ];

    protected $messages = [
        'jenjangPendidikan.jenjang_pendidikan.required' => 'Jenjang pendidikan tidak boleh kosong',
    ];

    public function mount(): void
    {
        $this->user = Auth::user();
        $this->loadJenjangPendidikan($this->id, $this->menu);
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
            $this->redirectRoute('jenjangPendidikan');
            return;
        }
        $this->validate();

        try {
            DB::beginTransaction();

            JenjangPendidikan::updateOrCreate(
                [
                    'id' => $this->jenjangPendidikan['id'] ?? null
                ],
                $this->jenjangPendidikan
            );

            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            Log::info('Error: '. $e->getMessage());
            return;
        }

        $message = 'tambahkan data baru!';
        if (isset($this->jenjangPendidikan['id'])) {
            $message = 'ubah data!';
        }

        session()->flash('success', $message);
        $this->redirectRoute('jenjangPendidikan');
    }

    #[On('load-gelar-non-akademis')]
    public function loadJenjangPendidikan($id, $menu = 'detail'):void
    {
        $this->menu = $menu;
        if ($this->id != ''){
            $this->jenjangPendidikan = JenjangPendidikan::query()->withTrashed()->find($id)?->toArray();
        }

        if($this->menu === 'detail') $this->isDisabled = true;
    }

    public function render(): View
    {
        return view('livewire.admin.data-master.jenjang-pendidikan.form');
    }
}
