<?php

namespace App\Livewire\Pegawai;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Url;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

use App\Models\Wilayah;
use App\Models\Lapangan;
use App\Models\KontrakPegawai;
use App\Models\User;

class FormKontrak extends Component
{

    use WithFileUploads;
    public $kontrak = [];
    public $user = [];
    public $tanggal, $dokumen, $nomorKontrak, $tahunKontrak, $tanggalMulai, $tanggalSelesai, $wilayah, $lapangan, $latitude, $longitude, $statusKontrak;
    public bool $isDisabled = false;
    public $userLogin;
    public $roles = [];
    public $role;

    #[Url(history: true)]
    public string $id = '';

    #[Url(history: true)]
    public string $menu = '';

    protected $rules = [
        'kontrak.tanggal' => 'required',
        'kontrak.dokumen' => 'nullable',
        'kontrak.nomor_kontrak' => 'nullable',
        'kontrak.tahun_kontrak' => 'nullable',
        'kontrak.tanggal_mulai' => 'nullable',
        'kontrak.tanggal_selesai' => 'nullable',
        'kontrak.wilayah_id' => 'nullable',
        'kontrak.lapangan_id' => 'nullable',
        'kontrak.latitude' => 'nullable',
        'kontrak.longitude' => 'nullable',
        'kontrak.status_kontrak' => 'nullable',
    ];

    public function mount(): void
    {
        $this->userLogin = Auth::user();
        $this->wilayah = Wilayah::query()->get();
        $this->lapangan = Lapangan::query()->get();


        if(!$this->userLogin->hasAnyPermission(['edit'])){
            $this->isDisabled = true;
        }
    }

    #[On('refresh')]
    public function refreshIsDisabled($isDisabled):void
    {
        $this->isDisabled = $isDisabled;
    }


    #[On('load-kontrak')]
    public function loadKontrak($id, $menu = 'detailkontrak'):void
    {
        $this->menu = $menu;
        $this->roles = Role::query()->get();
        if ($this->id != ''){
            $this->kontrak = KontrakPegawai::query()->withTrashed()->find($id)?->toArray();
            $this->user = User::query()->with('roles')->find($this->kontrak['user_id'] ?? null)?->toArray();
            $this->role = $this->user['roles'][0]['name'] ?? null;
        }
        if($this->menu === 'detailkontrak')  $this->isDisabled = true;
    }


    public function render()
    {
        return view('livewire.pegawai.form-kontrak');
    }
}
