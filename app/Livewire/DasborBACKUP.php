<?php

namespace App\Livewire;

use App\Models\Bidang;
use App\Models\JenisKelamin;
use App\Models\Lokasi;
use App\Models\Pegawai;
use App\Models\Suku;
use Illuminate\View\View;
use Livewire\Component;
use App\Models\Wilayah;
use App\Models\Lapangan;

class Dasbor extends Component
{

    public $bidangs = [];
    public $jenisKelamins = [];
    public $statusPegawai = [];
    public $lokasi = [];
    public $suku = [];

    public $wilayahs = [];
    public $lapangans = [];
    public $tahuns = [2024,2023];

    // total
    public $totalASN = 0;
    public $totalNonASN = 0;

    public $totalOAP = 0;
    public $totalNonOAP = 0;

    public $totalLakiLaki = 0;
    public $totalPerempuan = 0;

    public $totalASN_OAP = 0;
    public $totalNonASN_OAP = 0;

    public $totalASN_NonOAP = 0;
    public $totalNonASN_NonOAP = 0;

    public $totalASN_LakiLaki = 0;
    public $totalNonASN_LakiLaki = 0;

    public $totalASN_Perempuan = 0;
    public $totalNonASN_Perempuan = 0;

    public $totalBidang = 0;
    public $totalLokasi = 0;


    public function mount(): void
    {
        // map data
        

        $this->wilayahs = Wilayah::query()->get();
        $this->lapangans = Lapangan::query()->get();

        // Pegawai: ASN && Publik
        $this->totalASN = Pegawai::query()
                    ->where('is_asn', '=', true)
                    ->where('published_at', '!=', null)
                    ->count();

        // Pegawai: NON ASN && Publik
        $this->totalNonASN = Pegawai::query()
                    ->where('is_asn', '=', false)
                    ->where('published_at', '!=', null)
                    ->count();

        // Pegawai: OAP && Publik
        $this->totalOAP = Pegawai::with('suku')
                    ->whereHas('suku', function ($query){
                        $query->where('id', 1); // id=1 > OAP
                    })
                    ->where('published_at', '!=', null)
                    ->count();

        // Pegawai: Non OAP && Publik
        $this->totalNonOAP = Pegawai::with('suku')
                    ->whereHas('suku', function ($query){
                        $query->where('id', 2); // id=2 > Non OAP
                    })
                    ->where('published_at', '!=', null)
                    ->count();

        // Pegawai: Laki-Laki && Publik
        $this->totalLakiLaki = Pegawai::with('jenisKelamin')
                    ->whereHas('jenisKelamin', function ($query){
                        $query->where('id', 1); // id=1 > Laki-Laki
                    })
                    ->where('published_at', '!=', null)
                    ->count();

        // Pegawai: Perempuan && Publik                  
        $this->totalPerempuan = Pegawai::with('jenisKelamin')
                    ->whereHas('jenisKelamin', function ($query){
                        $query->where('id', 2); // id=2 > Perempuan
                    })
                    ->where('published_at', '!=', null)
                    ->count();

        // Pegawai: ASN && OAP && Publik   
        $this->totalASN_OAP = Pegawai::with('suku')
                    ->whereHas('suku', function ($query){
                        $query->where('id', 1); // id=1 > OAP
                    })
                    ->where('is_asn', '=', true)
                    ->where('published_at', '!=', null)
                    ->count();

        // Pegawai: Non ASN && Non OAP && Publik
        $this->totalNonASN_OAP = Pegawai::with('suku')
                    ->whereHas('suku', function ($query){
                        $query->where('id', 1); // id=1 > Non OAP
                    })
                    ->where('is_asn', '=', false)
                    ->where('published_at', '!=', null)
                    ->count();

        // Pegawai: ASN && Non OAP && Publik
        $this->totalASN_NonOAP = Pegawai::with('suku')
                    ->whereHas('suku', function ($query){
                        $query->where('id', 2); // id=2 > Non OAP
                    })
                    ->where('is_asn', '=', true)
                    ->where('published_at', '!=', null)
                    ->count();
        
        // Bidang: Publik
        $this->totalBidang = Bidang::query()
                    ->where('published_at', '!=', null)
                    ->count();

        // Lokasi: Publik
        $this->totalLokasi = Lokasi::query()
                    ->where('published_at', '!=', null)
                    ->count();
    
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
