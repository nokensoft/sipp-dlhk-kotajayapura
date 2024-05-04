<?php

namespace App\Livewire\Pegawai;

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
    public string $title = "ASN";
    public bool $isAsn = true;

    #[Url(history: true)]
    public string $id = '';

    public function mount(): void
    {
        if (request()->segment(1) === 'non-asn'){
            $this->title = 'Non ASN';
            $this->subtitle = 'Data Non ASN';
            $this->isAsn = false;
        }

        if (in_array($this->menu, ['create', 'view'])) {
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Tambah Data $this->title";
        }
    }

    #[On('action')]
    public function action():void
    {
        if (in_array($this->menu, ['create', 'view'])) {
            $this->redirect(route('asn'));
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
        $this->menu='edit';
        $this->id = $id;
    }
    #[On('view')]
    public function view($id):void
    {
        $this->menu='view';
        $this->id = $id;
    }

    public function render(): View
    {
        return view('livewire.pegawai.index');
    }
}
