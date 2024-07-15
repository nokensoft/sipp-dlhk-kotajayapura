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
    public string $route = '';
    public string $segment = '';

    #[Url(history: true)]
    public string $id = '';

    public function mount(): void
    {
        $this->segment = request()->segment(2);
        if ($this->segment === 'kepaladinas'){
            $this->title = 'Laporan Kepala Dinas';
            $this->subtitle = 'Data laporan Kepala Dinas...';
            $this->route = 'laporanKepalaDinas';
        }

        if ($this->segment === 'kepalabidang'){
            $this->title = 'Laporan Kepala Bidang';
            $this->subtitle = 'Data laporan Kepala Bidang...';
            $this->route = 'laporanKepalaBidang';
        }

        if ($this->segment === 'kepalaseksi'){
            $this->title = 'Laporan Kepala Seksi';
            $this->subtitle = 'Data laporan Kepala Seksi...';
            $this->route = 'laporanKepalaSeksi';
        }

        $this->buttonMenu();
    }

    #[On('action')]
    public function action():void
    {
        if (in_array($this->menu, ['tambah', 'ubah'])) {
            $this->redirect(url('laporan', 'kepaladinas'));
        }
        if($this->menu === ''){
            $this->menu = 'tambah';
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Tambah Data $this->title";
        }
    }

    #[On('ubah')]
    public function ubah($id):void
    {

        if($this->menu === 'detail'){
            $this->dispatch('load-laporan', id:$id, menu: 'ubah');
        }
        $this->menu='ubah';
        $this->id = $id;
        $this->buttonMenu();
        $this->dispatch('refresh', false);
    }

    #[On('detail')]
    public function detail($id):void
    {
        $this->menu='detail';
        $this->id = $id;
        $this->buttonMenu();
        $this->isDisabled = true;
    }

    private function buttonMenu():void{
        if ($this->menu === 'tambah') {
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Tambah Data $this->title";
        }else if ($this->menu === 'ubah') {
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Ubah Data $this->title";
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


                $this->redirectRoute(request()->segment(2));
            }

            $record = Laporan::query()->find($id);
            $record->delete();
            session()->flash('success', 'Data berhasil dihapus sementara/dipindahkan ke tempat sampah');
            $this->redirectRoute($this->route, ['menu' => 'tempat_sampah']);
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
