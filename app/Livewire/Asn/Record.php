<?php

namespace App\Livewire\Asn;

use App\Models\Pegawai;
use Illuminate\Support\Carbon;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class Record extends Component
{
    use WithPagination;

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

    public function action($menu): void
    {
        $this->paginators['page'] = 1;
        $this->page = 1;
        $this->menu = $menu;
    }

    public function publishOrDraft($id): void
    {
        $record = Pegawai::query()->withTrashed()->find($id);
        if($record->published_at == null){
            $record->published_at = Carbon::now();
        }else{
            $record->published_at = null;
        }
        $record->deleted_at = null;
        $record->save();
    }

    public function delete($id): void
    {
        $record = Pegawai::query()->find($id);
        $record->published_at = null;
        $record->save();
        $record->delete();
    }

    public function modal($id): void
    {
        $this->id = $id;
    }

    public function changePaginate($value):void
    {
        $this->paginate = $value;
    }

    public function render(): View
    {
        $this->totalAll = Pegawai::query()->count();
        $this->totalPublik = Pegawai::query()->published()->count();
        $this->totalKonsep = Pegawai::query()->draft()->count();
        $this->totalTempatSampah = Pegawai::query()->withTrashed()->whereNotNull('deleted_at')->count();
        $query = Pegawai::query()->where('is_asn',true)
            ->when(strlen($this->search) > 2, function ($query) {
                $query
                    ->where('nama_depan', 'like', '%' . $this->search . '%')
                    ->orWhere('nama_tengah', 'like', '%' . $this->search . '%')
                    ->orWhere('nama_belakang', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('no_hp', 'like', '%' . $this->search . '%')
                    ->orWhere('keterangan', 'like', '%' . $this->search . '%')
                    ->orWhere('catatan', 'like', '%' . $this->search . '%')
                    ->orWhereHas('bidang', fn ($query) => $query->where('bidang', 'like', '%' . $this->search . '%'))
                    ->orWhereHas('lokasiKerja', fn ($query) => $query->where('lokasi_kerja', 'like', '%' . $this->search . '%'))
                    ->orWhereHas('jenisKelamin', fn ($query) => $query->where('jenis_kelamin', 'like', '%' . $this->search . '%'))
                    ->orWhereHas('agama', fn ($query) => $query->where('agama', 'like', '%' . $this->search . '%'))
                    ->orWhereHas('pangkatGolongan', fn ($query) => $query->where('pangkat_golongan', 'like', '%' . $this->search . '%'))
                    ->orWhereHas('suku', fn ($query) => $query->where('suku', 'like', '%' . $this->search . '%'))
                    ->orWhereHas('distrik', fn ($query) => $query->where('distrik', 'like', '%' . $this->search . '%'))
                    ->orWhereHas('kelurahan', fn ($query) => $query->where('kelurahan', 'like', '%' . $this->search . '%'))
                    ->orWhereHas('jabatan', fn ($query) => $query->where('jabatan', 'like', '%' . $this->search . '%'))
                    ->orWhereHas('deskripsiTugas', fn ($query) => $query->where('deskripsi_tugas', 'like', '%' . $this->search . '%'))
                    ->orWhereHas('gelarDepan', fn ($query) => $query->where('gelar_depan', 'like', '%' . $this->search . '%'))
                    ->orWhereHas('gelarBelakang', fn ($query) => $query->where('gelar_belakang', 'like', '%' . $this->search . '%'))
                    ->orWhereHas('gelarAkademis', fn ($query) => $query->where('gelar_akademis', 'like', '%' . $this->search . '%'))
                    ->orWhereHas('jenjangPendidikan', fn ($query) => $query->where('jenjang_pendidikan', 'like', '%' . $this->search . '%'))
                    ->orWhereHas('statusPerkawinan', fn ($query) => $query->where('status_perkawinan', 'like', '%' . $this->search . '%'));
            })
        ;
        if ($this->menu === '' || $this->menu == 'semua') {
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
        return view('livewire.asn.record', ['records' => $records]);
    }
}
