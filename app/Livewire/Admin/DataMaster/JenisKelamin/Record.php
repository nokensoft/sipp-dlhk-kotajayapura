<?php

namespace App\Livewire\Admin\DataMaster\JenisKelamin;

use Livewire\Component;
use App\Models\JenisKelamin;
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
        $record = JenisKelamin::query()->withTrashed()->find($id);
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
        $record = JenisKelamin::query()->withTrashed()->whereNotNull('deleted_at')->find($id);
        $record->deleted_at = null;
        $record->save();
        session()->flash('success', 'Data berhasil dikembalikan!');
    }

    public function delete($id): void
    {
        $record = JenisKelamin::query()->withTrashed()->whereNotNull('deleted_at')->find($id);
        if(isset($record->deleted_at)){
            $record->user?->forceDelete();
            $record->forceDelete();
            session()->flash('success', 'Data berhasil dihapus permanen');
            return;
        }
        $record = JenisKelamin::query()->find($id);
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
        $this->totalAll = JenisKelamin::query()->count();
        $this->totalPublik = JenisKelamin::query()->published()->count();
        $this->totalKonsep = JenisKelamin::query()->draft()->count();
        $this->totalTempatSampah = JenisKelamin::query()->withTrashed()->whereNotNull('deleted_at')->count();
        $query = JenisKelamin::query()
            ->when(strlen($this->search) > 2, function ($query) {
                $query
                    ->where(function ($query) {
                        $query
                            ->where('jenis_kelamin', 'like', '%' . $this->search . '%')
                            ->orWhere('keterangan', 'like', '%' . $this->search . '%');
                    });
            });
        
        if ($this->menu === '') {
            $records = $query->withTrashed()->paginate($this->paginate)->withQueryString();
        } elseif($this->menu === 'publik'){
            $records = $query->published()->paginate($this->paginate)->withQueryString();
        } elseif($this->menu === 'konsep'){
            $records = $query->draft()->paginate($this->paginate)->withQueryString();
        } elseif($this->menu === 'tempat_sampah'){
            $records = $query->withTrashed()->whereNotNull('deleted_at')->paginate($this->paginate)->withQueryString();
        }
        
        return view('livewire.admin.data-master.jenis-kelamin.record', ['records' => $records]);
        
    }
}
