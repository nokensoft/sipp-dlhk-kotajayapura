<?php

namespace App\Livewire\Pengguna;

use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;

class Index extends Component
{
    #[Url(history: true)]
    public ?string $page = '';
    public ?string $buttonTitle = 'Tambah';
    public ?string $buttonIcon = "fa-solid fa-plus";
    public string $subtitle = "Data Pengguna";

    public function mount(): void
    {
        if ($this->page === 'create') {
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Tambah Data Pengguna";
        }
    }

    public function action():void
    {
        if ($this->page === 'create') {
            $this->page = '';
            $this->buttonTitle = 'Tambah';
            $this->buttonIcon = 'fa-solid fa-plus';
            $this->subtitle = "Data Pengguna";
        }else{
            $this->page = 'create';
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Tambah Data Pengguna";
        }
    }
    public function render(): View
    {
        return view('livewire.pengguna.index');
    }
}
