<?php

namespace App\Livewire\Rekapan;

use App\Models\Suku;
use App\Models\JenisKelamin;
use App\Models\JenjangPendidikan;
use App\Models\StatusPerkawinan;
use App\Models\Wilayah;
use Illuminate\View\View;
use Livewire\Component;

class PegawaiKeseluruhan extends Component
{

    public $sukus = [];
    public $jenisKelamins = [];
    public $jenjangPendidikans = [];
    public $statusPerkawinans = [];
    public $statusPegawais = [];
    public $wilayahs = [];


    public function mount(): void
    {
        
        // ------------------------------------------------------------- suku 
        Suku::with('pegawai')->each(function ($suku) {
            $this->sukus[] = [
                'name' => $suku->suku,
                'data' => [$suku->pegawai->count()]
            ];
        });
        $this->sukus = json_encode($this->sukus);
        
        // ------------------------------------------------------------- jenis kelamin 
        JenisKelamin::with('pegawai')->each(function ($jenis_kelamin) {
            $this->jenisKelamins[] = [
                'name' => $jenis_kelamin->jenis_kelamin,
                'data' => [$jenis_kelamin->pegawai->count()]
            ];
        });
        $this->jenisKelamins = json_encode($this->jenisKelamins);
        
        // ------------------------------------------------------------- jenjang pendidikan 
        JenjangPendidikan::with('pegawai')->each(function ($jenjang_pendidikan) {
            $this->jenjangPendidikans[] = [
                'name' => $jenjang_pendidikan->jenjang_pendidikan,
                'data' => [$jenjang_pendidikan->pegawai->count()]
            ];
        });
        $this->jenjangPendidikans = json_encode($this->jenjangPendidikans);
        
        // ------------------------------------------------------------- status pernikahan
        StatusPerkawinan::with('pegawai')->each(function ($status_perkawinan) {
            $this->statusPerkawinans[] = [
                'name' => $status_perkawinan->status_perkawinan,
                'data' => [$status_perkawinan->pegawai->count()]
            ];
        });
        $this->statusPerkawinans = json_encode($this->statusPerkawinans);

        // ------------------------------------------------------------- wilayah
        


    }

    public function render(): View
    {
        return view('livewire.rekapan.pegawaiKeseluruhan');
    }
}
