<?php

namespace App\Livewire\Lokasi;

use App\Models\Lokasi;
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
    public string $subtitle = "Data lokasi kerja di untuks setiap petugas lapangan";
    public string $title = "Lokasi";
    public bool $isDisabled = false;


    #[Url(history: true)]
    public string $id = '';

    public function mount(): void
    {
        if ($this->menu === 'tambah') {
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Tambah data lokasi kerja untuk setiap petugas lapangan";
        }

        $this->buttonMenu();

    }

    #[On('action')]
    public function action(): void
    {
        if (in_array($this->menu, ['tambah', 'ubah'])) {
            $this->redirect(route('lokasi'));
        }
        if($this->menu === ''){
            $this->menu = 'tambah';
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Tambah Data $this->title";
        }
    }

    #[On('ubah')]
    public function ubah($id): void
    {
        if($this->menu === 'view'){
            $this->dispatch('load-lokasi', id:$id, menu: 'ubah');
        }
        $this->menu = 'ubah';
        $this->id = $id;
        $this->buttonMenu();
    }

    #[On('detail')]
    public function detail($id):void
    {
        $this->menu='detail';
        $this->id = $id;
        $this->buttonMenu();
    }

    private function buttonMenu():void{
        if ($this->menu === 'tambah') {
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Tambah data lokasi kerja untuk setiap petugas lapangan";
        }else if ($this->menu === 'ubah') {
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Ubah lokasi kerja untuk setiap petugas lapangan";
        }else if ($this->menu === 'detail')
        {
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Informasi lokasi kerja untuk setiap petugas lapangan";
        }

    }

    public function delete($id): void
    {
        $record = Lokasi::query()->withTrashed()->whereNotNull('deleted_at')->find($id);
        if(isset($record->deleted_at)){
            $record->user?->forceDelete();
            $record->forceDelete();
            session()->flash('success', 'Data berhasil dihapus permanen');
            return;
        }
        $record = Lokasi::query()->find($id);
        $record->published_at = null;
        $record->save();
        $record->delete();
        session()->flash('success', 'Data berhasil dihapus sementara/dipindahkan ke tempat sampah');
        $this->redirectRoute('lokasi');
    }



    public function render(): View
    {
        return view('livewire.lokasi.index');
    }
}
