<?php

use App\Http\Controllers\PdfController;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\DataMaster\PangkatGolongan\Index as PangkatGolongan;
use App\Livewire\Admin\DataMaster\Jabatan\Index as Jabatan;
use App\Livewire\Admin\DataMaster\Tugas\Index as Tugas;
use App\Livewire\Admin\DataMaster\GelarDepan\Index as GelarDepan;
use App\Livewire\Admin\DataMaster\GelarBelakang\Index as GelarBelakang;
use App\Livewire\Admin\DataMaster\GelarNonAkademis\Index as GelarNonAkademis;
use App\Livewire\Admin\DataMaster\JenjangPendidikan\Index as JenjangPendidikan;
use App\Livewire\Admin\DataMaster\Diklat\Index as Diklat;
use App\Livewire\Admin\DataMaster\SertifikatKeahlian\Index as SertifikatKeahlian;
use App\Livewire\Admin\DataMaster\StatusPerkawinan\Index as StatusPerkawinan;
use App\Livewire\Admin\DataMaster\Agama\Index as Agama;
use App\Livewire\Admin\DataMaster\JenisKelamin\Index as JenisKelamin;
use App\Livewire\Admin\DataMaster\Suku\Index as Suku;
use App\Livewire\Admin\DataMaster\Distrik\Index as Distrik;
use App\Livewire\Admin\DataMaster\Kelurahan\Index as Kelurahan;

use App\Livewire\Laporan\Index as Laporan;

Route::get('/', function () {
    return view('AdminMaster.login');
});

// ------------------ ADMIN MASTER
// require_once 'AdminMaster/index.php';

use App\Livewire\Dasbor;
use App\Livewire\Profil;
use App\Livewire\Pengaturan;
use App\Livewire\Pegawai\Index as Asn;
use App\Livewire\NonAsn\Index as NonAsn;
use App\Livewire\Kontrak\Index as Kontrak;
use App\Livewire\Bidang\Index as Bidang;
use App\Livewire\Lokasi\Index as Lokasi;
use App\Livewire\Wilayah\Index as Wilayah;
use App\Livewire\Lapangan\Index as Lapangan;
use App\Livewire\Pengguna\Index as Pengguna;

// rekapan
use App\Livewire\Rekapan\PegawaiKontrak;
use App\Livewire\Rekapan\PegawaiASN;
use App\Livewire\Rekapan\PegawaiKeseluruhan;

Route::get('/profil', Profil::class)->name('adminmaster.profil');
Route::get('/pengaturan', Pengaturan::class)->name('adminmaster.pengaturan');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dasbor', Dasbor::class)->name('dasbor');
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/preview', [PdfController::class, 'printPdf'])->name('preview-pdf');
    Route::get('/download', [PdfController::class, 'downloadPdf'])->name('download-pdf');

    Route::get('/pegawai', Asn::class)->name('pegawai');
    // Route::get('/non-asn', NonAsn::class)->name('nonAsn');
    Route::get('/kontrak', Kontrak::class)->name('kontrak');
    Route::get('/bidang', Bidang::class)->name('bidang');
    Route::get('/lokasi', Lokasi::class)->name('lokasi');
    Route::get('/wilayah', Wilayah::class)->name('wilayah');
    Route::get('/lapangan', Lapangan::class)->name('lapangan');
    Route::get('/pengguna', Pengguna::class)->name('pengguna');
    Route::prefix('data-master')->group(function () {
        Route::get('pangkat-golongan', PangkatGolongan::class)->name('pangkatGolongan');
        Route::get('jabatan', Jabatan::class)->name('jabatan');
        Route::get('tugas', Tugas::class)->name('tugas');
        Route::get('gelar-depan', GelarDepan::class)->name('gelarDepan');
        Route::get('gelar-belakang', GelarBelakang::class)->name('gelarBelakang');
        Route::get('gelar-non-akademis', GelarNonAkademis::class)->name('gelarNonAkademis');
        Route::get('jenjang-pendidikan', JenjangPendidikan::class)->name('jenjangPendidikan');
        Route::get('diklat', Diklat::class)->name('diklat');
        Route::get('sertifikat-keahlian', SertifikatKeahlian::class)->name('sertifikatKeahlian');
        Route::get('status-perkawinan', StatusPerkawinan::class)->name('statusPerkawinan');
        Route::get('agama', Agama::class)->name('agama');
        Route::get('jenis-kelamin', JenisKelamin::class)->name('jenisKelamin');
        Route::get('suku', Suku::class)->name('suku');
        Route::get('distrik', Distrik::class)->name('distrik');
        Route::get('kelurahan', Kelurahan::class)->name('kelurahan');

    });

    // rekapan
    Route::prefix('rekapan')->group(function () {
        Route::get('pegawaikontrak', PegawaiKontrak::class)->name('rekapanPegawaiKontrak');
        Route::get('pegawaiasn', PegawaiASN::class)->name('rekapanPegawaiASN');
        Route::get('pegawaihonorer', PegawaiKontrak::class)->name('rekapanPegawaiHonorer');
        Route::get('pegawaikeseluruhan', PegawaiKeseluruhan::class)->name('rekapanPegawaiKeseluruhan');

    });


    // laporan
    Route::prefix('laporan')->group(function () {
        Route::get('kepaladinas', Laporan::class)->name('laporanKepalaDinas');
        Route::get('kepalabidang', Laporan::class)->name('laporanKepalaBidang');
        Route::get('kepalaseksi', Laporan::class)->name('laporanKepalaSeksi');
    });

});
