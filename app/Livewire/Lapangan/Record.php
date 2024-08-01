<?php

namespace App\Livewire\Lapangan;

use Livewire\Component;
use App\Models\Lapangan;
use Illuminate\Support\Carbon;
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

    public function action($menu): void
    {
        $this->paginators['page'] = 1;
        $this->page = 1;
        $this->menu = $menu;
    }

    public function publishOrDraft($id): void
    {
        $record = Lapangan::query()->withTrashed()->find($id);
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

    public function refreshMap()
    {
        $this->dispatch('Map', 'refreshMap');
    }


    public function undo($id): void
    {
        $record = Lapangan::query()->withTrashed()->whereNotNull('deleted_at')->find($id);
        $record->deleted_at = null;
        $record->save();
        session()->flash('success', 'Data berhasil dikembalikan!');
    }

    public function delete($id): void
    {
        $record = Lapangan::query()->withTrashed()->whereNotNull('deleted_at')->find($id);
        if(isset($record->deleted_at)){
            $record->user?->forceDelete();
            $record->forceDelete();
            session()->flash('success', 'Data berhasil dihapus permanen');
            return;
        }
        $record = Lapangan::query()->find($id);
        $record->published_at = null;
        $record->save();
        $record->delete();
        session()->flash('success', 'Data berhasil dihapus sementara/dipindahkan ke tempat sampah');
    }

    public function modal($id): void
    {
        $this->id = $id;
    }

    public function changePaginate($value):void
    {
        $this->paginate = $value;
    }
    public function render()
    {
        $this->totalAll = Lapangan::query()->count();
        $this->totalPublik = Lapangan::query()->published()->count();
        $this->totalKonsep = Lapangan::query()->draft()->count();
        $this->totalTempatSampah = Lapangan::query()->withTrashed()->whereNotNull('deleted_at')->count();
        $query = Lapangan::query()
            ->when(strlen($this->search) > 2, function ($query) {
                $query
                    ->where(function ($query) {
                        $query
                            ->where('nama_lapangan', 'like', '%' . $this->search . '%')
                            ->orWhere('keterangan', 'like', '%' . $this->search . '%');
                    });
            });

        // if ($this->menu === '' || $this->menu === 'semua') {
        if ($this->menu === '' || $this->menu === 'view') {
            $records = $query->withTrashed()->paginate($this->paginate)->withQueryString();
        } elseif($this->menu === 'publik'){
            $records = $query->published()->paginate($this->paginate)->withQueryString();
        } elseif($this->menu === 'konsep'){
            $records = $query->draft()->paginate($this->paginate)->withQueryString();
        } elseif($this->menu === 'tempat_sampah'){
            $records = $query->withTrashed()->whereNotNull('deleted_at')->paginate($this->paginate)->withQueryString();
        }

        $locations =Lapangan::published()->get();
        return view('livewire.lapangan.record', ['records' => $records, 'locations' => $locations]);
    }
}
