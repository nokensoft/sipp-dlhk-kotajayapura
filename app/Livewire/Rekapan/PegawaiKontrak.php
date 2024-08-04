<?php

namespace App\Livewire\Rekapan;

use App\Models\Bidang;
use App\Models\JenisKelamin;
use App\Models\Lokasi;
use App\Models\Pegawai;
use App\Models\Suku;
use Illuminate\View\View;
use Livewire\Component;
use App\Models\Wilayah;
use App\Models\Lapangan;

class PegawaiKontrak extends Component
{

    public $bidangs = [];

    public $sukus = [];


    public function mount(): void
    {
    
        Bidang::with('pegawai')->each(function ($bidang) {
            $this->bidangs[] = [
                'name' => $bidang->bidang,
                'data' => [$bidang->pegawai->count()]
            ];
        });
    
        Suku::with('pegawai')->each(function ($suku) {
            $this->sukus[] = [
                'name' => $suku->suku,
                'data' => [$suku->pegawai->count()]
            ];
        });
        
        $this->bidangs = json_encode($this->bidangs);

        $this->sukus = json_encode($this->sukus);
    }

    public function render(): View
    {
        return view('livewire.rekapan.pegawaiKontrak');
    }
}
