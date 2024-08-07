<?php

namespace App\Livewire;

use App\Models\Bidang;
use App\Models\Distrik;
use App\Models\Kontrak;
use App\Models\Lapangan;
use App\Models\Wilayah;
use Livewire\Component;
use App\Models\Lokasi;
use Illuminate\View\View;

class Map extends Component
{
    public $locations;
    protected $listeners = ['refreshMap' => 'resetMap'];
    public $maps;
    public $geoJson;
    public $districts = [];
    public $bidangs = [];
    public $wilayahs = [];
    public $lapangans = [];
    public $tahuns = [2024,2023];

    public function mount(): void
    {
        // $this->districts = Distrik::with(['pegawais.bidang', 'pegawais.lokasi'])->get()->toArray();
        $this->wilayahs = Wilayah::with(['lapangans.wilayah', 'lapangans.kontrak.pegawai'])->get()->toArray();
        // $this->wilayahs = Wilayah::with(['pegawai.lapangan', 'pegawais.lokasi'])->get()->toArray();
        $this->bidangs = Bidang::query()->get()->toArray();
        
        $this->lapangans = Lapangan::with(['kontrak.pegawai'])->get()->toArray();

        $this->tahuns  = Kontrak::with('lapangan')->get()->pluck('tahun')->toArray();
        $this->tahuns = array_unique($this->tahuns);

        $this->resetMap();
    }

    public function resetMap()
    {
        $this->locations = Lokasi::published()->get();
    }

    public function render(): View
    {
        $locations =  $this->locations  ?? Lokasi::published()->get();
        return view('livewire.map',compact('locations'));
    }

}
