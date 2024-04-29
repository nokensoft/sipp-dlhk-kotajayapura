<?php

namespace App\Livewire\Asn;

use App\Models\Pegawai;
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
    public string $subtitle = "Data ASN";

    #[Url(history: true)]
    public string $id = '';

    public function mount(): void
    {
        if ($this->menu === 'create') {
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Tambah Data ASN";
        }
    }

    #[On('action')]
    public function action():void
    {
        if ($this->menu === 'create') {
            $this->menu = '';
            $this->buttonTitle = 'Tambah';
            $this->buttonIcon = 'fa-solid fa-plus';
            $this->subtitle = "Data ASN";
        }
        if($this->menu === ''){
            $this->menu = 'create';
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Tambah Data ASN";
        }
    }

    #[On('edit')]
    public function edit($id):void
    {
        $this->menu='edit';
        $this->id = $id;
    }

    public function render(): View
    {
        return view('livewire.asn.index');
    }
}
