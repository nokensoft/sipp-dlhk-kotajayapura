<?php

namespace App\Livewire\Admin\DataMaster\Jabatan;

use App\Models\Jabatan;
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
    public string $subtitle = "Data jabatan untuk setiap petugas PNS";
    public string $title = "Jabatan";
    public bool $isDisabled = false;

    #[Url(history: true)]
    public string $id = '';

    public function mount(): void
    {
        if ($this->menu === 'create') {
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Tambah data jabatan untuk setiap petugas lapangan";
        }

        $this->buttonMenu();
    }

    #[On('action')]
    public function action(): void
    {
        if ($this->menu === 'create') {
            $this->redirect(route('jabatan'));
        }
        if ($this->menu === '') {
            $this->menu = 'create';
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Tambah Data $this->title";
        }
    }

    #[On('edit')]
    public function edit($id):void
    {
        if($this->menu === 'view'){
            $this->dispatch('load-jabatan', id:$id, menu: 'edit');
        }
        $this->menu='edit';
        $this->id = $id;
        $this->buttonMenu();
        $this->dispatch('refresh', false);
    }

    #[On('view')]
    public function view($id):void
    {
        $this->menu='view';
        $this->id = $id;
        $this->buttonMenu();
        $this->isDisabled = true;
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
            $record = Jabatan::query()->withTrashed()->whereNotNull('deleted_at')->find($id);

            // jika hapus permanen
            if(isset($record->deleted_at)){
                // $record->user?->forceDelete();
                $record->forceDelete();
                session()->flash('success', 'Data berhasil dihapus permanen');
                $this->redirectRoute('jabatan');
            }

            $record = Jabatan::query()->find($id);
            $record->delete();
            session()->flash('success', 'Data berhasil dihapus sementara/dipindahkan ke tempat sampah');
            $this->redirectRoute('jabatan', ['menu' => 'tempat_sampah']);
        }catch (\Exception $e){
            Log::info('Error : '. $e->getMessage());
            session()->flash('error', 'Error: '.$e->getMessage());
        }
    }

    public function render(): View
    {
        return view('livewire.admin.data-master.jabatan.index');
    }


}
