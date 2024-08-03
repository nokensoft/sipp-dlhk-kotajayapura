<?php

namespace App\Livewire\Wilayah;

use App\Models\Pegawai;
use App\Models\Wilayah;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

class Form extends Component
{
    public $wilayah = [];
    public $pegawai;

    #[Url(history: true)]
    public string $id = '';

    #[Url(history: true)]
    public string $menu = '';

    public bool $isDisabled = false;

    protected $rules = [
        'wilayah.nama_wilayah' => 'required',
        'wilayah.pegawai_id' => 'required',
        'wilayah.keterangan' => 'nullable',
        'wilayah.geojson' => 'nullable',
        'wilayah.published_at' => 'nullable',
    ];

    protected $messages = [
        'wilayah.pegawai_id.required' => 'Koordinator tidak boleh kosong',
        'wilayah.nama_wilayah.required' => 'Nama wilayah tidak boleh kosong',
    ];

    #[On('load-wilayah')]
    public function loadWilayah($id, $menu = 'view'):void
    {

        $this->menu = $menu;
        if ($this->id != ''){
            $this->wilayah = Wilayah::query()->withTrashed()->find($id)?->toArray();
        }
        if($this->menu == 'view') {
            $this->isDisabled = true;
        } else{
            $this->isDisabled = false;
        }
    }


    public function mount(): void
    {
        $this->loadWilayah($this->id, $this->menu);
        if ($this->id != ''){
            $this->wilayah = Wilayah::query()->find($this->id)?->toArray();
        }

        $this->pegawai = Pegawai::query()->get();
    }

    public function save(): void
    {
        $this->validate();

        if(isset($this->wilayah['geojson'])) $this->wilayah['geojson'] = json_encode($this->wilayah['geojson']);
        $this->validate();

        try {
            DB::beginTransaction();

            Wilayah::updateOrCreate(
                [
                    'id' => $this->wilayah['id'] ?? null
                ],
                $this->wilayah
            );

            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            Log::info('Error: '. $e->getMessage());
            return;
        }

        $message = 'tambahkan data baru!';
        if (isset($this->wilayah['id'])) {
            $message = 'ubah data!';
        }

        session()->flash('success', $message);
        $this->redirectRoute('wilayah');
    }
    public function render()
    {
        return view('livewire.wilayah.form');
    }
}
