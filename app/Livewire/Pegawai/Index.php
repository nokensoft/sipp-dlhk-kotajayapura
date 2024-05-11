<?php

namespace App\Livewire\Pegawai;

use App\Models\Pegawai;
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

        $this->buttonMenu();
    }

    #[On('action')]
    public function action():void
    {
        if (in_array($this->menu, ['create', 'edit'])) {
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
        if($this->menu === 'view'){
            $this->dispatch('load-pegawai', id:$id, menu: 'edit');
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
            $record = Pegawai::query()->withTrashed()->whereNotNull('deleted_at')->find($id);

            // jika hapus permanen
            if(isset($record->deleted_at)){
                $pathGambar = storage_path('app/public/' . $record->gambar ?? '');
                $pathKtp = storage_path('app/public/' . $record->ktp ?? '');
                $pathKk = storage_path('app/public/' . $record->kk ?? '');
                $pathIjazah= storage_path('app/public/' . $record->ijazah ?? '');
                $pathTranskipNilai= storage_path('app/public/' . $record->transkip_nilai ?? '');
                $pathAkteKelahiran= storage_path('app/public/' . $record->akte_kelahiran ?? '');
                $pathAktePernikahan= storage_path('app/public/' . $record->akte_pernikahan ?? '');
                if (file_exists($pathGambar)) unlink($pathGambar);
                if (file_exists($pathKtp)) unlink($pathKtp);
                if (file_exists($pathKk)) unlink($pathKk);
                if (file_exists($pathIjazah)) unlink($pathIjazah);
                if (file_exists($pathTranskipNilai)) unlink($pathTranskipNilai);
                if (file_exists($pathAkteKelahiran)) unlink($pathAkteKelahiran);
                if (file_exists($pathAktePernikahan)) unlink($pathAktePernikahan);
                $record->user?->forceDelete();
                $record->forceDelete();
                session()->flash('success', 'Data berhasil dihapus permanen');
                if (request()->segment(1) === 'non-asn'){
                    $this->redirectRoute('nonAsn');
                }else{
                    $this->redirectRoute('asn');
                }
            }

            $record = Pegawai::query()->find($id);
            $record->delete();
            session()->flash('success', 'Data berhasil dihapus sementara');
            $this->redirectRoute($this->title === 'Non ASN' ? 'nonAsn' : 'asn', ['menu' => 'tempat_sampah']);
        }catch (\Exception $e){
            Log::info('Error : '. $e->getMessage());
            session()->flash('error', 'Error: '.$e->getMessage());
        }
    }

    public function render(): View
    {
        return view('livewire.pegawai.index');
    }
}
