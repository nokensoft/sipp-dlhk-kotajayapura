<?php

namespace App\Livewire;

use App\Models\Bidang;
use App\Models\JenisKelamin;
use App\Models\Lokasi;
use App\Models\Pegawai;
use App\Models\Suku;
use Illuminate\View\View;
use Livewire\Component;

class Dasbor extends Component
{
    public $bidangs = [];
    public $jenisKelamins = [];
    public $statusPegawai = [];
    public $lokasi = [];
    public $suku = [];
    public $totalAsn = 0;
    public $totalNonAsn = 0;
    public $totalPria = 0;
    public $totalWanita = 0;


    public function mount(): void
    {
        $this->totalAsn = Pegawai::query()->where('is_asn', '=', true)->count();
        $this->totalNonAsn = Pegawai::query()->where('is_asn', '=', false)->count();
        $this->totalPria = Pegawai::with('jenisKelamin')
                    ->whereHas('jenisKelamin', function ($query){
                        $query->where('jenis_kelamin', 'Laki-Laki');
                    })->count();
        $this->totalWanita = Pegawai::with('jenisKelamin')
                    ->whereHas('jenisKelamin', function ($query){
                        $query->where('jenis_kelamin', 'Perempuan');
                    })->count();
         Bidang::with('pegawai')->each(function ($bidang) {
            $this->bidangs[] = [
                'name' => $bidang->bidang,
                'data' => [$bidang->pegawai->count()]
            ];
        });
         Suku::with('pegawai')->each(function ($suku) {
            $this->suku[] = [
                'name' => $suku->suku,
                'data' => [$suku->pegawai->count()]
            ];
        });
         Lokasi::with('pegawai')->each(function ($lokasi) {
            $this->lokasi[] = [
                'name' => $lokasi->lokasi,
                'data' => [$lokasi->pegawai->count()]
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
        $this->lokasi = json_encode($this->lokasi);
        $this->suku = json_encode($this->suku);
    }

    public function render(): View
    {
        return view('livewire.dasbor');
    }
}
