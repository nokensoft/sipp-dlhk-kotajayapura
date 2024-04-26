<?php

namespace App\Livewire\Bidang;

use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;

class Index extends Component
{
    #[Url(history: true)]
    public ?string $page = '';
    public ?string $buttonTitle = 'Tambah';
    public ?string $buttonIcon = "fa-solid fa-plus";
    public string $subtitle = "Data bidang kerja di untuks setiap petugas lapangan";

    public function mount(): void
    {
        if ($this->page === 'create') {
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Tambah data bidang kerja untuk setiap petugas lapangan";
        }
    }

    public function action():void
    {
        if ($this->page === 'create') {
            $this->page = '';
            $this->buttonTitle = 'Tambah';
            $this->buttonIcon = 'fa-solid fa-plus';
            $this->subtitle = "Data bidang kerja di untuks setiap petugas lapangan";
        }else{
            $this->page = 'create';
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Data bidang kerja di untuks setiap petugas lapangan";
        }
    }
    public function render(): View
    {
        return view('livewire.bidang.index');
    }
}
