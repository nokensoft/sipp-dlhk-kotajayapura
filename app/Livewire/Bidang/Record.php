<?php

namespace App\Livewire\Bidang;

use Livewire\Component;
use App\Models\Bidang;
use Illuminate\Support\Carbon;
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

    public function action($menu): void
    {
        $this->paginators['page'] = 1;
        $this->page = 1;
        $this->menu = $menu;
    }

    public function publishOrDraft($id): void
    {
        $record = Bidang::query()->withTrashed()->find($id);
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
        $record = Bidang::query()->withTrashed()->whereNotNull('deleted_at')->find($id);
        if(isset($record->deleted_at)){
            $record->user?->forceDelete();
            $record->forceDelete();
            session()->flash('success', 'Data berhasil dihapus permanen');
            return;
        }
        $record = Bidang::query()->find($id);
        $record->published_at = null;
        $record->save();
        $record->delete();
        session()->flash('success', 'Data berhasil dihapus sementara');
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
        $this->totalAll = Bidang::query()->count();
        $this->totalPublik = Bidang::query()->published()->count();
        $this->totalKonsep = Bidang::query()->draft()->count();
        $this->totalTempatSampah = Bidang::query()->withTrashed()->whereNotNull('deleted_at')->count();
        $query = Bidang::query()
            ->when(strlen($this->search) > 2, function ($query) {
                $query
                    ->where(function ($query) {
                        $query
                            ->where('bidang', 'like', '%' . $this->search . '%')
                            ->orWhere('keterangan', 'like', '%' . $this->search . '%');
                    });
            });
        
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
        
        return view('livewire.bidang.record', ['records' => $records]);
        
    }
}
