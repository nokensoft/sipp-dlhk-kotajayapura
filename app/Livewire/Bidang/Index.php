<?php

namespace App\Livewire\Bidang;

use App\Models\Bidang;
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
    public string $subtitle = "Data bidang kerja di untuks setiap petugas lapangan";
    public string $title = "Bidang";

    #[Url(history: true)]
    public string $id = '';

    public function mount(): void
    {
        if ($this->menu === 'create') {
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Tambah data bidang kerja untuk setiap petugas lapangan";
        }

        $this->buttonMenu();
    }

    #[On('action')]
    public function action(): void
    {
        if ($this->menu === 'create') {
            $this->redirect(route('bidang'));
        }
        if ($this->menu === '') {
            $this->menu = 'create';
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Tambah Data $this->title";
        }
    }

    // #[On('edit')]
    // public function edit($id): void
    // {
    //     $this->menu = 'edit';
    //     $this->id = $id;
    // }
    

    #[On('edit')]
    public function edit($id):void
    {
        if($this->menu === 'view'){
            $this->dispatch('load-bidang', id:$id, menu: 'edit');
        }
        $this->menu='edit';
        $this->id = $id;
        $this->buttonMenu();
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
        }
    }

    public function delete($id): void
    {
        try {
            $record = Bidang::query()->withTrashed()->whereNotNull('deleted_at')->find($id);

            // jika hapus permanen
            if(isset($record->deleted_at)){
                $record->user?->forceDelete();
                $record->forceDelete();
                session()->flash('success', 'Data berhasil dihapus permanen');
                $this->redirectRoute('bidang');
            }

            $record = Bidang::query()->find($id);
            $record->delete();
            session()->flash('success', 'Data berhasil dihapus sementara/dipindahkan ke tempat sampah');
            $this->redirectRoute($this->title === 'Bidang', ['menu' => 'tempat_sampah']);
        }catch (\Exception $e){
            Log::info('Error : '. $e->getMessage());
            session()->flash('error', 'Error: '.$e->getMessage());
        }
    }

    public function render(): View
    {
        return view('livewire.bidang.index');
    }


}
