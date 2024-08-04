<?php

namespace App\Livewire;

use Illuminate\View\View;
use Livewire\Component;
use App\Models\Wilayah;
use App\Models\Lapangan;

class Dasbor extends Component
{

    public $wilayahs = [];
    public $lapangans = [];
    public $tahuns = [2024,2023];

    public function mount(): void
    {
        $this->wilayahs = Wilayah::query()->get();
        $this->lapangans = Lapangan::query()->get();
    }

    public function render(): View
    {
        return view('livewire.dasbor');
    }
}
