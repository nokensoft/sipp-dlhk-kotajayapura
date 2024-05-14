<?php

namespace App\Livewire\Pegawai;

use Livewire\Component;
use App\Models\Pegawai;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Livewire\Attributes\Url;
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
    public bool $isAsn = true;

    public function mount(): void
    {
        $this->isAsn = request()->segment(1) === 'asn';
    }

    public function action($menu): void
    {
        $this->paginators['page'] = 1;
        $this->page = 1;
        $this->menu = $menu;
    }

    public function publishOrDraft($id): void
    {
        $record = Pegawai::query()->withTrashed()->find($id);
        $type = 'publik';
        if($record->published_at == null){
            $record->published_at = Carbon::now();
        }else{
            $record->published_at = null;
            $type = 'konsep';
        }
        $record->deleted_at = null;
        $record->save();
        session()->flash('success', 'Data diubah menjadi '.$type);
    }

    public function undo($id): void
    {
        $record = Pegawai::query()->withTrashed()->whereNotNull('deleted_at')->find($id);
        $record->deleted_at = null;
        $record->save();
        session()->flash('success', 'Data berhasil dikembalikan!');
    }

    public function delete($id): void
    {
        try {
            $this->search = '';
            $record = Pegawai::query()->withTrashed()->whereNotNull('deleted_at')->find($id);

            // jika hapus permanen
            if(isset($record->deleted_at)){
                $pathGambar = storage_path('app/public/' . $record->gambar ?? '');
                $pathKtp = storage_path('app/public/' . $record->ktp ?? '');
                $pathKk = storage_path('app/public/' . $record->kk ?? '');
                $pathIjazah= storage_path('app/public/' . $record->ijazah ?? '');
                $pathTranskipNilai= storage_path('app/public/' . $record->transkip_nilai ?? '');
                $pathAkteKelahiran= storage_path('app/public/' . $record->akte_kelahiran ?? '');
                $pathAktePernikahan= storage_path('app/public/' . $record->akte_pernikahan ?? '');
                if (file_exists($pathGambar)) unlink($pathGambar);
                if (file_exists($pathKtp)) unlink($pathKtp);
                if (file_exists($pathKk)) unlink($pathKk);
                if (file_exists($pathIjazah)) unlink($pathIjazah);
                if (file_exists($pathTranskipNilai)) unlink($pathTranskipNilai);
                if (file_exists($pathAkteKelahiran)) unlink($pathAkteKelahiran);
                if (file_exists($pathAktePernikahan)) unlink($pathAktePernikahan);
                $record->user?->forceDelete();
                $record->forceDelete();
                session()->flash('success', 'Data berhasil dihapus permanen');
                return;
            }

            $record = Pegawai::query()->find($id);
            $record->delete();
            session()->flash('success', 'Data berhasil dihapus sementara/dipindahkan ke tempat sampah');
        }catch (\Exception $e){
            Log::info('Error : '. $e->getMessage());
            session()->flash('error', 'Error: '.$e->getMessage());
        }
    }

    public function modal($id): void
    {
        $this->id = $id;
    }

    public function changePaginate($value):void
    {
        $this->paginate = $value;
    }

    public function paginationView()
    {
        return 'customPagination.custom-pagination-view';
    }

    public function render(): View
    {
        $this->totalAll = Pegawai::query()->withTrashed()->where('is_asn',$this->isAsn)->count();
        $this->totalPublik = Pegawai::query()->where('is_asn',$this->isAsn)->published()->count();
        $this->totalKonsep = Pegawai::query()->where('is_asn',$this->isAsn)->draft()->count();
        $this->totalTempatSampah = Pegawai::query()->where('is_asn',$this->isAsn)->withTrashed()->whereNotNull('deleted_at')->count();
        $query = Pegawai::query()
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
                    ->orWhereHas('lokasi', fn ($query) => $query->where('lokasi', 'like', '%' . $this->search . '%'))
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
        if (in_array($this->menu, ['','semua'])) {
            $records = $query->where('is_asn',$this->isAsn)->withTrashed()->paginate($this->paginate)->withQueryString();
        }
        if($this->menu === 'publik'){
            $records = $query->where('is_asn',$this->isAsn)->published()->paginate($this->paginate)->withQueryString();
        }
        if($this->menu === 'konsep'){
            $records = $query->where('is_asn',$this->isAsn)->draft()->paginate($this->paginate)->withQueryString();
        }
        if($this->menu === 'tempat_sampah'){
            $records = $query->where('is_asn',$this->isAsn)->withTrashed()->whereNotNull('deleted_at')->paginate($this->paginate)->withQueryString();
        }
        return view('livewire.pegawai.record', ['records' => $records]);
    }
}
