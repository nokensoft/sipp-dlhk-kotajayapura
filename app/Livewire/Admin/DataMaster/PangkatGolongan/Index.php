<?php

namespace App\Livewire\Admin\DataMaster\PangkatGolongan;

use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;

class Index extends Component
{
    #[Url(history: true)]
    public ?string $page = '';
    public ?string $buttonTitle = 'Tambah';
    public ?string $buttonIcon = "fa-solid fa-plus";
    public string $subtitle = "Data Pangkat Golongan";

    public function mount(): void
    {
        if ($this->page === 'create') {
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Tambah Data Pangkat Golongan";
        }
    }

    public function action():void
    {
        if ($this->page === 'create') {
            $this->page = '';
            $this->buttonTitle = 'Tambah';
            $this->buttonIcon = 'fa-solid fa-plus';
            $this->subtitle = "Data Pangkat Golongan";
        }else{
            $this->page = 'create';
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Tambah Data Pangkat Golongan";
        }
    }

    public function render(): View
    {
        return view('livewire.admin.data-master.pangkat-golongan.index');
    }
}
