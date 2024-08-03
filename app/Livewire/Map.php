<?php

namespace App\Livewire;

use App\Models\Bidang;
use App\Models\Distrik;
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

    public function mount(): void
    {
        $this->districts = Distrik::with(['pegawais.bidang', 'pegawais.lokasi'])->get()->toArray();
        $this->bidangs = Bidang::query()->get()->toArray();

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
