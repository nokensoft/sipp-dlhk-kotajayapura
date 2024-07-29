<?php

namespace App\Livewire\Wilayah;

use App\Models\Wilayah;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

class Index extends Component
{
    #[Url(history: true)]
    public ?string $menu = '';
    public ?string $buttonTitle = 'Tambah';
    public ?string $buttonIcon = "fa-solid fa-plus";
    public string $subtitle = "Kelola Wilayah Kerja, Koordinator Wilayah.";
    public string $title = "Wilayah";
    public bool $isDisabled = false;


    #[Url(history: true)]
    public string $id = '';

    public function mount(): void
    {
        if ($this->menu === 'tambah') {
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Tambah wilayah baru.";
        }

        $this->buttonMenu();

    }

    #[On('action')]
    public function action(): void
    {
        if (in_array($this->menu, ['tambah', 'ubah'])) {
            $this->redirect(route('wilayah'));
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
            $this->dispatch('load-wilayah', id:$id, menu: 'ubah');
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
            $this->subtitle = "Tambah wilayah baru.";
        }else if ($this->menu === 'ubah') {
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Ubah wilayah kerja untuk setiap petugas lapangan";
        }else if ($this->menu === 'detail')
        {
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Informasi wilayah kerja untuk setiap petugas lapangan";
        }

    }

    public function delete($id): void
    {
        $record = Wilayah::query()->withTrashed()->whereNotNull('deleted_at')->find($id);
        if(isset($record->deleted_at)){
            $record->user?->forceDelete();
            $record->forceDelete();
            session()->flash('success', 'Data berhasil dihapus permanen');
            return;
        }
        $record = Wilayah::query()->find($id);
        $record->published_at = null;
        $record->save();
        $record->delete();
        session()->flash('success', 'Data berhasil dihapus sementara/dipindahkan ke tempat sampah');
        $this->redirectRoute('wilayah');
    }


    public function render()
    {
        return view('livewire.wilayah.index');
    }
}
