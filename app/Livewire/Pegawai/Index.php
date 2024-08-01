<?php

namespace App\Livewire\Pegawai;

use App\Models\Pegawai;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

class Index extends Component
{
    #[Url(history: true)]
    public ?string $menu = '';
    public ?string $title = '';
    public ?string $subtitle = '';
    public ?string $buttonTitle = 'Tambah';
    public ?string $buttonIcon = "fa-solid fa-plus";
    public bool $isDisabled = false;

    #[Url(history: true)]
    public string $id = '';

    public function mount(): void
    {
        $this->buttonMenu();
    }

    #[On('action')]
    public function action():void
    {
        if (in_array($this->menu, ['tambah', 'ubah'])) {
            $this->redirect(route('pegawai'));
        }
        if($this->menu === ''){
            $this->menu = 'tambah';
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Tambah Data ";
        }
    }

    #[On('ubah')]
    public function ubah($id):void
    {

        if($this->menu === 'detail'){
            $this->dispatch('load-pegawai', id:$id, menu: 'ubah');
        }
        $this->menu='ubah';
        $this->id = $id;
        $this->buttonMenu();
        $this->dispatch('refresh', false);
    }

    #[On('detail')]
    public function detail($id):void
    {
        $this->menu='detail';
        $this->id = $id;
        $this->buttonMenu();
        $this->isDisabled = true;
    }

    #[On('kontrak')]
    public function kontrak($id):void
    {
        $this->menu='kontrak';
        $this->id = $id;
        $this->title = 'Kontrak';
        $this->buttonMenu();
        $this->subtitle = 'Subtitle';
    }

    private function buttonMenu():void{
        if ($this->menu === 'tambah') {
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Tambah Data Pegawai";
        }else if ($this->menu === 'ubah') {
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Ubah Data Pegawai";
        }
        else if ($this->menu === 'kontrak') {
            $this->buttonTitle = 'Kembali';
            $this->buttonIcon = 'fa-solid fa-arrow-left';
            $this->subtitle = "Data Kontrak Pegawai";
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
                if (Storage::exists($pathGambar)) unlink($pathGambar);
                if (Storage::exists($pathKtp)) unlink($pathKtp);
                if (Storage::exists($pathKk)) unlink($pathKk);
                if (Storage::exists($pathIjazah)) unlink($pathIjazah);
                if (Storage::exists($pathTranskipNilai)) unlink($pathTranskipNilai);
                if (Storage::exists($pathAkteKelahiran)) unlink($pathAkteKelahiran);
                if (Storage::exists($pathAktePernikahan)) unlink($pathAktePernikahan);
                $record->user?->forceDelete();
                $record->forceDelete();
                session()->flash('success', 'Data berhasil dihapus permanen');
                $this->redirectRoute('pegawai');
            }

            $record = Pegawai::query()->find($id);
            $record->delete();
            session()->flash('success', 'Data berhasil dihapus sementara/dipindahkan ke tempat sampah');
            $this->redirectRoute('pegawai', ['menu' => 'tempat_sampah']);
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
