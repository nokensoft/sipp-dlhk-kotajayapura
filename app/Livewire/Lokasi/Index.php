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

    #[Url(history: true)]
    public string $id = '';

    public function mount(): void
    {
        if ($this->menu === 'create') {
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Tambah data lokasi kerja untuk setiap petugas lapangan";
        }

        if ($this->menu === 'edit') {
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Ubah data lokasi kerja untuk setiap petugas lapangan";
        }

        if ($this->menu === 'view')
        {
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Informasi lokasi kerja untuk setiap petugas lapangan";
        }

    }

    #[On('action')]
    public function action(): void
    {
        if ($this->menu === 'create') {
            $this->redirect(route('lokasi'));
        }
        if ($this->menu === '') {
            $this->menu = 'create';
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Tambah Data $this->title";
        }
    }

    #[On('edit')]
    public function edit($id): void
    {
        if($this->menu === 'view'){
            $this->dispatch('load-lokasi', id:$id, menu: 'edit');
        }
        $this->menu = 'edit';
        $this->id = $id;
    }

    #[On('view')]
    public function view($id):void
    {
        $this->menu='view';
        $this->id = $id;
        $this->buttonMenu();
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
        }else if ($this->menu == 'view')
        {
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Informasi lokasi kerja untuk setiap petugas lapangan";
        }

    }


    public function render(): View
    {
        return view('livewire.lokasi.index');
    }
}
