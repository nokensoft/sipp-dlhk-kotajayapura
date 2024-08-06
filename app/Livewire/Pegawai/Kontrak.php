<?php

namespace App\Livewire\Pegawai;

use Livewire\Component;

use App\Models\Kontrak as KontrakPegawai;
use App\Models\Pegawai;
use App\Models\Lapangan;
use App\Models\Wilayah;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;

class Kontrak extends Component
{
    #[Url(history: true)]
    public ?string $menu = '';

    #[Url]
    public $page;

    #[Url(history: true)]
    public ?string $search = '';

    public int $totalAll = 0;
    public int $totalPublik = 0;
    public int $totalKonsep = 0;
    public int $totalTempatSampah = 0;
    public $id;
    public $paginate = 5;
    public $listPaginate = [5,10,25,50,100];
    public bool $isAsn = true;
    public $pegawai = [];
    public $wilayah = [];
    public ?string $selectedWilayah;
    public $lapangan = [];
    public ?string $selectedLapangan;
    public $status = ['Berjalan','Penggantian'];
    public $tahun = ['2021','2022','2023','2024','2025','2026'];
    public $idWilayah = '';
    public array $filters = [];
    public ?string $title = '';
    public ?string $subtitle = '';
    public ?string $buttonTitle = 'Tambah';
    public ?string $buttonIcon = "fa-solid fa-plus";
    public bool $isDisabled = false;

    public function mount(): void
    {
        $this->pegawai = Pegawai::where('id',$this->id)->first()->toArray();
        $this->wilayah = Wilayah::get()->toArray();
        $this->lapangan = Lapangan::where('wilayah_id',$this->idWilayah)->get()->toArray();
    }

    public function selectLapangan($statusLapangan = null){
        $this->selectedLapangan = $statusLapangan;
        $this->filters['status_pernikahan'] = $statusLapangan;
        $this->lapangan = Lapangan::where('wilayah_id',$this->idWilayah)->get()->toArray();
    }

    public function selectWilayah($statusWilayah = null, $idWilayah = null){
        $this->selectedWilayah = $statusWilayah;
        $this->idWilayah = $idWilayah;
        $this->lapangan = Lapangan::where('wilayah_id',$this->idWilayah)->get()->toArray();
        $this->filters['status_wilayah'] = $statusWilayah;

    }



    // #[On('actionkontrak')]
    // public function actionkontrak():void
    // {

    //     if (in_array($this->menu, ['tambahkontrak', 'ubahkontrak'])) {
    //         $this->redirect(route('pegawai'));
    //     }
    //     if($this->menu === 'kontrak'){
    //         $this->menu = 'tambahkontrak';
    //         $this->buttonTitle = 'Kembali';
    //         $this->buttonIcon = 'fa-solid fa-arrow-left';
    //         $this->subtitle = "Tambah Data ";
    //     }
    // }


    public function render()
    {
        $this->totalAll =  KontrakPegawai::query()->where('pegawai_id',$this->id)->withTrashed()->count();
        $this->totalPublik =  KontrakPegawai::query()->where('pegawai_id',$this->id)->published()->count();
        $this->totalKonsep =  KontrakPegawai::query()->where('pegawai_id',$this->id)->draft()->count();
        $this->totalTempatSampah = KontrakPegawai::query()->where('pegawai_id',$this->id)->withTrashed()->whereNotNull('deleted_at')->count();

        $query = KontrakPegawai::query()
         ->when(isset($this->selectedLapangan), function($query){
             $query->whereHas('lapangan', fn ($query) => $query->where('nama_Lapangan', $this->selectedLapangan));
        })
        // ->when(isset($this->selectedWilayah), function($query){
        //     $query->whereHas('jenisKelamin', fn ($query) => $query->where('jenis_kelamin', $this->selectedWilayah));
        // })
        // ->when(isset($this->selectedJenjangPendidikan), function($query){
        //     $query->whereHas('jenjangPendidikan', fn ($query) => $query->where('jenjang_pendidikan', $this->selectedJenjangPendidikan));
        // })
        // ->when(isset($this->selectedStatusPernikahan), function($query){
        //     $query->whereHas('statusPerkawinan', fn ($query) => $query->where('status_perkawinan', $this->selectedStatusPernikahan));
        // })
        ->where('pegawai_id',$this->id)
        ->when(strlen($this->search) > 2, function ($query) {
            $query
                ->orWhere('pegawai_id', 'like', '%' . $this->search . '%');
        })
    ;
    if (in_array($this->menu, ['semuakontrak',''])) {
        $records = $query->withTrashed()->paginate($this->paginate)->withQueryString();
    }
    if($this->menu === 'kontrak'){
        $records = $query->withTrashed()->paginate($this->paginate)->withQueryString();
    }
    if($this->menu === 'publikkontrak'){
        $records = $query->published()->paginate($this->paginate)->withQueryString();
    }
    if($this->menu === 'konsepkontrak'){
        $records = $query->draft()->paginate($this->paginate)->withQueryString();
    }
    if($this->menu === 'tempat_sampahkontrak'){
        $records = $query->withTrashed()->whereNotNull('deleted_at')->paginate($this->paginate)->withQueryString();
    }

        return view('livewire.pegawai.kontrak',['records' => $records]);
    }
}
