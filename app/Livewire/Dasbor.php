<?php

namespace App\Livewire;

use App\Models\Bidang;
use App\Models\JenisKelamin;
use App\Models\Pegawai;
use Illuminate\View\View;
use Livewire\Component;

class Dasbor extends Component
{
    public $bidangs = [];
    public $jenisKelamins = [];
    public $statusPegawai = [];


    public function mount(): void
    {
         Bidang::with('pegawai')->each(function ($bidang) {
            $this->bidangs[] = [
                'name' => $bidang->bidang,
                'data' => [$bidang->pegawai->count()]
            ];
        });
        JenisKelamin::with('pegawai')->each(function ($jenisKelamin){
            $this->jenisKelamins[] = ['name' => $jenisKelamin->jenis_kelamin, 'data' => [$jenisKelamin->pegawai->count()] ];
        });
        $this->statusPegawai = [
            ['name' => 'ASN', 'data' => [Pegawai::query()->where('is_asn', '=', true)->count()]],
            ['name' => 'NON ASN', 'data' => [Pegawai::query()->where('is_asn', '=', false)->count()]],
        ];
        $this->bidangs = json_encode($this->bidangs);
        $this->jenisKelamins = json_encode($this->jenisKelamins);
        $this->statusPegawai = json_encode($this->statusPegawai);
    }

    public function render(): View
    {
        return view('livewire.dasbor');
    }
}
