<?php

namespace App\Livewire\Lapangan;

use App\Models\Pegawai;
use App\Models\Wilayah;
use App\Models\Lapangan;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

class Form extends Component
{
    public $lapangan = [];
    public $pegawai;
    public $wilayah;

    #[Url(history: true)]
    public string $id = '';

    #[Url(history: true)]
    public string $menu = '';

    public bool $isDisabled = false;

    protected $rules = [
        'lapangan.nama_lapangan' => 'required',
        'lapangan.pegawai_id' => 'required',
        'lapangan.keterangan' => 'nullable',
        'lapangan.geojson' => 'nullable',
        'lapangan.published_at' => 'nullable',
    ];

    protected $messages = [
        'lapangan.pegawai_id.required' => 'Koordinator tidak boleh kosong',
        'lapangan.nama_lapangan.required' => 'Nama lapangan tidak boleh kosong',
    ];

    #[On('load-lapangan')]
    public function loadLapangan($id, $menu = 'view'):void
    {

        $this->menu = $menu;
        if ($this->id != ''){
            $this->lapangan = Lapangan::query()->withTrashed()->find($id)?->toArray();
        }
        if($this->menu == 'view') {
            $this->isDisabled = true;
        } else{
            $this->isDisabled = false;
        }
    }


    public function mount(): void
    {
        $this->loadLapangan($this->id, $this->menu);
        if ($this->id != ''){
            $this->lapangan = Lapangan::query()->find($this->id)?->toArray();
        }

        $this->pegawai = Pegawai::query()->get();
        $this->wilayah = Wilayah::query()->get();
    }

    public function save(): void
    {
        $this->validate();

        try {
            DB::beginTransaction();

            Lapangan::updateOrCreate(
                [
                    'id' => $this->lapangan['id'] ?? null
                ],
                $this->lapangan
            );

            DB::commit();

        } catch (Exception $e) {
            DB::rollBack();
            Log::info('Error: '. $e->getMessage());
            return;
        }

        $message = 'tambahkan data baru!';
        if (isset($this->lapangan['id'])) {
            $message = 'ubah data!';
        }

        session()->flash('success', $message);
        $this->redirectRoute('lapangan');
    }
    public function render()
    {
        return view('livewire.lapangan.form');
    }
}
