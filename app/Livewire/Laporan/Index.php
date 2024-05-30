<?php

namespace App\Livewire\Laporan;

use App\Models\Laporan;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

class Index extends Component
{
    #[Url(history: true)]
    public ?string $menu = '';
    public ?string $buttonTitle = 'Tambah';
    public ?string $buttonIcon = "fa-solid fa-plus";
    public string $subtitle = "Data laporan";
    public string $title = "Laporan";
    public bool $isAsn = true;
    public bool $isDisabled = false;

    #[Url(history: true)]
    public string $id = '';

    public function mount(): void
    {
        if (request()->segment(2) === 'kepaladinas'){
            $this->title = 'Laporan Kepala Dinas';
            $this->subtitle = 'Data laporan Kepala Dinas...';
            $this->kategori = 'kepaladinas';
        }

        if (request()->segment(2) === 'kepalabidang'){
            $this->title = 'Laporan Kepala Bidang';
            $this->subtitle = 'Data laporan Kepala Bidang...';
            $this->kategori = 'kepalabidang';
        }
        
        if (request()->segment(2) === 'kepalaseksi'){
            $this->title = 'Laporan Kepala Seksi';
            $this->subtitle = 'Data laporan Kepala Seksi...';
            $this->kategori = 'kepalaseksi';
        }

        $this->buttonMenu();
    }

    #[On('action')]
    public function action():void
    {
        if (in_array($this->menu, ['create', 'edit'])) {
            $this->redirect(url('laporan', 'kepaladinas'));
        }
        if($this->menu === ''){
            $this->menu = 'create';
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Tambah Data $this->title";
        }
    }

    #[On('edit')]
    public function edit($id):void
    {

        if($this->menu === 'view'){
            $this->dispatch('load-laporan', id:$id, menu: 'edit');
        }
        $this->menu='edit';
        $this->id = $id;
        $this->buttonMenu();
        $this->dispatch('refresh', false);
    }

    #[On('view')]
    public function view($id):void
    {
        $this->menu='view';
        $this->id = $id;
        $this->buttonMenu();
        $this->isDisabled = true;
    }

    private function buttonMenu():void{
        if ($this->menu === 'create') {
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Tambah Data $this->title";
        }else if ($this->menu === 'edit') {
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Edit Data $this->title";
        }
    }

    public function delete($id): void
    {
        try {
            $record = Laporan::query()->withTrashed()->whereNotNull('deleted_at')->find($id);

            // jika hapus permanen
            if(isset($record->deleted_at)){
                $pathLaporan = storage_path('app/public/' . $record->file ?? '');
                if (file_exists($pathLaporan)) unlink($pathLaporan);
                $record->user?->forceDelete();
                $record->forceDelete();
                session()->flash('success', 'Data berhasil dihapus permanen');

                if (request()->segment(1) === 'laporan-kepala-dinas'){
                    $this->redirectRoute('laporanKepalaDinas');
                } elseif (request()->segment(1) === 'laporan-kepala-bidang'){
                    $this->redirectRoute('laporanKepalaBidang');
                } else{
                    $this->redirectRoute('laporan-kepala-seksi');
                }
            }

            $record = Laporan::query()->find($id);
            $record->delete();
            session()->flash('success', 'Data berhasil dihapus sementara/dipindahkan ke tempat sampah');
            $this->redirectRoute($this->title === 'Laporan' ? 'laporan-kepala-dinas' : 'laporan-kepala-bidang', ['menu' => 'tempat_sampah']);
        }catch (\Exception $e){
            Log::info('Error : '. $e->getMessage());
            session()->flash('error', 'Error: '.$e->getMessage());
        }
    }

    public function render(): View
    {
        return view('livewire.laporan.index');
    }
}
