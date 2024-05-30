<?php

namespace App\Livewire\Laporan;

use Livewire\Component;
use App\Models\Laporan;
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
    public $kategori = 'kepala-dinas';

    public function mount(): void
    {
        $this->kategori = request()->segment(2);
        // $this->kategori = 'kepaladinas';
    }

    public function action($menu): void
    {
        $this->paginators['page'] = 1;
        $this->page = 1;
        $this->menu = $menu;
    }

    public function publishOrDraft($id): void
    {
        $record = Laporan::query()->withTrashed()->find($id);
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
        $record = Laporan::query()->withTrashed()->whereNotNull('deleted_at')->find($id);
        $record->deleted_at = null;
        $record->save();
        session()->flash('success', 'Data berhasil dikembalikan!');
    }

    public function delete($id): void
    {
        try {
            $this->search = '';
            $record = Laporan::query()->withTrashed()->whereNotNull('deleted_at')->find($id);
            // jika hapus permanen
            if(isset($record->deleted_at)){
                $pathFile = storage_path('app/public/' . $record->file ?? '');
                if (file_exists($pathFile)) unlink($pathFile);
                $record->user?->forceDelete();
                $record->forceDelete();
                session()->flash('success', 'Data berhasil dihapus permanen');
                return;
            }

            $record = Laporan::query()->find($id);
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
        $this->totalAll = Laporan::query()->withTrashed()->where('kategori',$this->kategori)->count();
        $this->totalPublik = Laporan::query()->where('kategori',$this->kategori)->published()->count();
        $this->totalKonsep = Laporan::query()->where('kategori',$this->kategori)->draft()->count();
        $this->totalTempatSampah = Laporan::query()->where('kategori',$this->kategori)->withTrashed()->whereNotNull('deleted_at')->count();
        $query = Laporan::query()
            ->when(strlen($this->search) > 2, function ($query) {
                $query
                    ->where('laporan', 'like', '%' . $this->search . '%')
                    ->orWhere('keterangan', 'like', '%' . $this->search . '%')
                    ->orWhere('kategori', 'like', '%' . $this->search . '%');
            })
        ;
        if (in_array($this->menu, ['','semua'])) {
            $records = $query->where('kategori',$this->kategori)->withTrashed()->paginate($this->paginate)->withQueryString();
        }
        if($this->menu === 'publik'){
            $records = $query->where('kategori',$this->kategori)->published()->paginate($this->paginate)->withQueryString();
        }
        if($this->menu === 'konsep'){
            $records = $query->where('kategori',$this->kategori)->draft()->paginate($this->paginate)->withQueryString();
        }
        if($this->menu === 'tempat_sampah'){
            $records = $query->where('kategori',$this->kategori)->withTrashed()->whereNotNull('deleted_at')->paginate($this->paginate)->withQueryString();
        }
        return view('livewire.laporan.record', ['records' => $records]);
    }
}