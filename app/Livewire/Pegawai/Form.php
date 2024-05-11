<?php

namespace App\Livewire\Pegawai;

use App\Models\Agama;
use App\Models\Bidang;
use App\Models\DeskripsiTugas;
use App\Models\Distrik;
use App\Models\GelarAkademis;
use App\Models\GelarBelakang;
use App\Models\GelarDepan;
use App\Models\Jabatan;
use App\Models\JenisKelamin;
use App\Models\JenjangPendidikan;
use App\Models\Kelurahan;
use App\Models\Lokasi;
use App\Models\PangkatGolongan;
use App\Models\Pegawai;
use App\Models\StatusPerkawinan;
use App\Models\Suku;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithFileUploads;
use Exception;

class Form extends Component
{
    use WithFileUploads;
    public $pegawai = [];
    public $user = [];
    public $bidang, $lokasi, $jenisKelamin, $agama, $pangkatGolongan, $suku, $distrik, $kelurahan, $jabatan, $deskripsiTugas, $gelarDepan, $gelarBelakang, $gelarAkademis, $jenjangPendidikan, $statusPerkawinan = [];
    public bool $isAsn = true;
    public bool $isDisabled = false;

    #[Url(history: true)]
    public string $id = '';

    #[Url(history: true)]
    public string $menu = '';

    protected $rules = [
        'pegawai.nama_depan' => 'required',
        'pegawai.nama_tengah' => 'nullable',
        'pegawai.nama_belakang' => 'nullable',
        'user.username' => 'required|unique:users,username',
        'pegawai.email' => 'nullable',
        'pegawai.no_hp' => 'nullable',
        'pegawai.gambar' => 'nullable|mimes:jpeg,png,jpg',
        'pegawai.ktp' => 'nullable|mimes:jpeg,png,jpg,pdf',
        'pegawai.kk' => 'nullable|mimes:jpeg,png,jpg,pdf',
        'pegawai.transkip_nilai' => 'nullable|mimes:jpeg,png,jpg,pdf',
        'pegawai.ijazah' => 'nullable|mimes:jpeg,png,jpg,pdf',
        'pegawai.akte_kelahiran' => 'nullable|mimes:jpeg,png,jpg,pdf',
        'pegawai.akte_pernikahan' => 'nullable|mimes:jpeg,png,jpg,pdf',
        'pegawai.bidang_id' => 'nullable',
        'pegawai.lokasi_id' => 'nullable',
        'pegawai.jenis_kelamin_id' => 'nullable',
        'pegawai.agama_id' => 'nullable',
        'pegawai.pangkat_golongan_id' => 'nullable',
        'pegawai.suku_id' => 'nullable',
        'pegawai.distrik_id' => 'nullable',
        'pegawai.kelurahan_id' => 'nullable',
        'pegawai.jabatan_id' => 'nullable',
        'pegawai.deskripsi_tugas_id' => 'nullable',
        'pegawai.gelar_depan_id' => 'nullable',
        'pegawai.gelar_belakang_id' => 'nullable',
        'pegawai.gelar_akademis_id' => 'nullable',
        'pegawai.jenjang_pendidikan_id' => 'nullable',
        'pegawai.status_perkawinan_id' => 'nullable',
        'pegawai.keterangan' => 'nullable',
        'pegawai.catatan' => 'nullable',
    ];

    protected $messages = [
        'pegawai.nama_depan.required' => 'Nama Depan tidak boleh kosong',
        'user.username.required' => 'Username tidak boleh kosong',
        'user.username.unique' => 'Username sudah digunakan!',
        'pegawai.gambar.mimes' => 'Gambar harus berupa format JPG, JPEG, atau PNG',
        'pegawai.ktp.mimes' => 'KTP harus berupa format JPG, JPEG, atau PNG',
        'pegawai.kk.mimes' => 'Kartu Keluarga harus berupa format JPG, JPEG, atau PNG',
        'pegawai.transkip_nilai.mimes' => 'Kartu Keluarga harus berupa format JPG, JPEG, atau PNG',
        'pegawai.ijazah.mimes' => 'Ijazah harus berupa format JPG, JPEG, atau PNG',
        'pegawai.akte_kelahiran.mimes' => 'Akte Kelahiran harus berupa format JPG, JPEG, atau PNG',
        'pegawai.akte_pernikahan.mimes' => 'Akte Pernikahan harus berupa format JPG, JPEG, atau PNG',
    ];

    public function mount(): void
    {
        $this->loadPegawai($this->id, $this->menu);
        $this->bidang = Bidang::query()->get();
        $this->lokasi = Lokasi::query()->get();
        $this->jenisKelamin = JenisKelamin::query()->get();
        $this->agama = Agama::query()->get();
        $this->pangkatGolongan = PangkatGolongan::query()->get();
        $this->suku = Suku::query()->get();
        $this->distrik = Distrik::query()->get();
        $this->kelurahan = Kelurahan::query()->get();
        $this->jabatan = Jabatan::query()->get();
        $this->deskripsiTugas = DeskripsiTugas::query()->get();
        $this->gelarDepan = GelarDepan::query()->get();
        $this->gelarBelakang = GelarBelakang::query()->get();
        $this->gelarAkademis = GelarAkademis::query()->get();
        $this->jenjangPendidikan = JenjangPendidikan::query()->get();
        $this->statusPerkawinan = StatusPerkawinan::query()->get();
    }

    public function save(): void
    {
        if(isset($this->user['id'])){
            $this->rules['user.username'] = 'required|unique:users,username,'.$this->user['id'];
        }
        $this->fileChecking();
        $this->validate();
        try {
            DB::beginTransaction();
            $this->user['password'] = Hash::make($this->user['username']);
             $user = User::updateOrCreate(
                 [
                     'id' => $this->user['id'] ?? null
                 ],
                 $this->user
             );
             $this->pegawai['user_id'] = $user->id;

             if (isset($this->pegawai['ktp']) && $this->pegawai['ktp'] != '' && !is_string($this->pegawai['ktp'])) {
                 $this->pegawai['ktp'] =  $this->uploadFile($this->pegawai['nama_depan'].'_ktp_',$this->pegawai['ktp']);
             }
             if (isset($this->pegawai['kk']) && $this->pegawai['kk'] != '' && !is_string($this->pegawai['kk'])) {
                 $this->pegawai['kk'] = $this->uploadFile($this->pegawai['nama_depan'].'_kk_',$this->pegawai['kk']);
             }
             if (isset($this->pegawai['gambar']) && $this->pegawai['gambar'] != '' && !is_string($this->pegawai['gambar'])) {
                 $this->pegawai['gambar'] =  $this->uploadFile($this->pegawai['nama_depan'].'_gambar_',$this->pegawai['gambar']);
             }
             if (isset($this->pegawai['ijazah']) && $this->pegawai['ijazah'] != '' && !is_string($this->pegawai['ijazah'])) {
                 $this->pegawai['ijazah'] = $this->uploadFile($this->pegawai['nama_depan'].'_ijazah_',$this->pegawai['ijazah']);
             }
             if (isset($this->pegawai['transkip_nilai']) && $this->pegawai['transkip_nilai'] != '' && !is_string($this->pegawai['transkip_nilai'])) {
                 $this->pegawai['transkip_nilai'] = $this->uploadFile($this->pegawai['nama_depan'].'_transkip_nilai_',$this->pegawai['transkip_nilai']);
             }
             if (isset($this->pegawai['akte_kelahiran']) && $this->pegawai['akte_kelahiran'] != '' && !is_string($this->pegawai['akte_kelahiran'])) {
                 $this->pegawai['akte_kelahiran'] = $this->uploadFile($this->pegawai['nama_depan'].'_akte_kelahiran_',$this->pegawai['akte_kelahiran']);
             }
             if (isset($this->pegawai['akte_pernikahan']) && $this->pegawai['akte_pernikahan'] != '' && !is_string($this->pegawai['akte_pernikahan'])) {
                 $this->pegawai['akte_pernikahan'] = $this->uploadFile($this->pegawai['nama_depan'].'_akte_pernikahan_',$this->pegawai['akte_pernikahan']);
             }

            $this->pegawai['is_asn'] = $this->isAsn;

             Pegawai::updateOrCreate(
                 [
                     'id' => $this->pegawai['id'] ?? null
                 ],
                 $this->pegawai
             );
             DB::commit();
        }catch (Exception $e){
            DB::rollBack();
            Log::info('Error: '. $e->getMessage());
            return;
        }
        $message = 'tambahkan data baru!';
        if (isset($this->pegawai['id'])){
            $message = 'ubah data!';
        }
        session()->flash('success', $message);
        if (isset($this->pegawai['id'])){
            $this->redirectRoute( $this->isAsn ? 'asn' : 'nonAsn',['menu' => 'view', 'id' => $this->pegawai['id'] ?? '']);
        }else{
            $this->redirectRoute( $this->isAsn ? 'asn' : 'nonAsn');
        }
    }

    private function fileChecking(): void
    {
        if(isset($this->pegawai['ktp']) && is_string($this->pegawai['ktp'])){
            $this->rules['pegawai.ktp'] = 'nullable';
        }
        if(isset($this->pegawai['kk']) && is_string($this->pegawai['kk'])){
            $this->rules['pegawai.kk'] = 'nullable';
        }
        if(isset($this->pegawai['gambar']) && is_string($this->pegawai['gambar'])){
            $this->rules['pegawai.gambar'] = 'nullable';
        }
        if(isset($this->pegawai['ijazah']) && is_string($this->pegawai['ijazah'])){
            $this->rules['pegawai.ijazah'] = 'nullable';
        }
        if(isset($this->pegawai['transkip_nilai']) && is_string($this->pegawai['transkip_nilai'])){
            $this->rules['pegawai.transkip_nilai'] = 'nullable';
        }
        if(isset($this->pegawai['akte_kelahiran']) && is_string($this->pegawai['akte_kelahiran'])){
            $this->rules['pegawai.akte_kelahiran'] = 'nullable';
        }
        if(isset($this->pegawai['akte_pernikahan']) && is_string($this->pegawai['akte_pernikahan'])){
            $this->rules['pegawai.akte_pernikahan'] = 'nullable';
        }
    }

    private function uploadFile($fileName, $file): string
    {
        $fileName = $fileName. '_'.microtime().'.'.$file->extension();
        $file->storeAs('public/files', $fileName);
        return 'files/'.$fileName;
    }

    #[On('download')]
    public function download($img){
        $filepath = public_path('storage/').$img;
        return Response::download($filepath);
    }

    #[On('load-pegawai')]
    public function loadPegawai($id, $menu = 'view'):void
    {
        $this->menu = $menu;
        if ($this->id != ''){
            $this->pegawai = Pegawai::query()->withTrashed()->find($id)?->toArray();
            $this->user = User::query()->find($this->pegawai['user_id'] ?? null)?->toArray();
        }
        if($this->menu == 'view') {
            $this->isDisabled = true;
        } else{
            $this->isDisabled = false;
        }
    }

    #[On('delete-file')]
    public function deleteFile($name):void
    {
        $this->pegawai[$name] = '';
    }

    public function render(): View
    {
        return view('livewire.pegawai.form');
    }
}
