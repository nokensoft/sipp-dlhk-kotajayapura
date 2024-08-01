<?php

namespace App\Livewire\Pegawai;

use Livewire\Component;

use App\Models\KontrakPegawai;

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

    public $status = ['Berjalan','Penggantian'];


    public function render()
    {
        $this->totalAll =  KontrakPegawai::query()->where('user_id',$this->id)->withTrashed()->count();
        $this->totalPublik =  KontrakPegawai::query()->where('user_id',$this->id)->published()->count();
        $this->totalKonsep =  KontrakPegawai::query()->where('user_id',$this->id)->draft()->count();
        $this->totalTempatSampah = KontrakPegawai::query()->where('user_id',$this->id)->withTrashed()->whereNotNull('deleted_at')->count();

        $query = KontrakPegawai::query()
        // ->when(isset($this->selectedSuku), function($query){
        //     $query->whereHas('suku', fn ($query) => $query->where('suku', $this->selectedSuku));
        // })
        // ->when(isset($this->selectedJenisKelamin), function($query){
        //     $query->whereHas('jenisKelamin', fn ($query) => $query->where('jenis_kelamin', $this->selectedJenisKelamin));
        // })
        // ->when(isset($this->selectedJenjangPendidikan), function($query){
        //     $query->whereHas('jenjangPendidikan', fn ($query) => $query->where('jenjang_pendidikan', $this->selectedJenjangPendidikan));
        // })
        // ->when(isset($this->selectedStatusPernikahan), function($query){
        //     $query->whereHas('statusPerkawinan', fn ($query) => $query->where('status_perkawinan', $this->selectedStatusPernikahan));
        // })
        ->when(strlen($this->search) > 2, function ($query) {
            $query
                ->where('kontrak_id', 'like', '%' . $this->search . '%')
                ->orWhere('user_id', 'like', '%' . $this->search . '%');
        })
    ;
    if (in_array($this->menu, ['kontrak','semua'])) {
        $records = $query->withTrashed()->paginate($this->paginate)->withQueryString();
    }
    if($this->menu === 'publik'){
        $records = $query->published()->paginate($this->paginate)->withQueryString();
    }
    if($this->menu === 'konsep'){
        $records = $query->draft()->paginate($this->paginate)->withQueryString();
    }
    if($this->menu === 'tempat_sampah'){
        $records = $query->withTrashed()->whereNotNull('deleted_at')->paginate($this->paginate)->withQueryString();
    }


        return view('livewire.pegawai.kontrak',['records' => $records]);
    }
}
