<?php

namespace App\Livewire\Lokasi;

use Livewire\Component;
use App\Models\Lokasi;
use Illuminate\View\View;

class Map extends Component
{
    public $locations;
    protected $listeners = ['refreshMap' => 'resetMap'];

    public function mount(): void
    {
        $this->resetMap();
    }

    public function resetMap()
    {
        $this->locations = Lokasi::published()->get();
    }

    public function render(): View
    {
        $locations =  $this->locations  ?? Lokasi::published()->get();
        return view('livewire.lokasi.map',compact('locations'));
    }

}
