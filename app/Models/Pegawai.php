<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lapangan(): BelongsTo
    {
        return $this->belongsTo(Lapangan::class, 'lapangan_id');
    }

    public function wilayah()
    {
        return $this->hasManyThrough(Lapangan::class, Wilayah::class);
    }

    public function bidang(): BelongsTo
    {
        return $this->belongsTo(Bidang::class, 'bidang_id');
    }

    public function lokasi(): BelongsTo
    {
        return $this->belongsTo(Lokasi::class, 'lokasi_id');
    }

    public function jenisKelamin(): BelongsTo
    {
        return $this->belongsTo(JenisKelamin::class, 'jenis_kelamin_id');
    }

    public function agama(): BelongsTo
    {
        return $this->belongsTo(Agama::class, 'agama_id');
    }

    public function pangkatGolongan(): BelongsTo
    {
        return $this->belongsTo(PangkatGolongan::class, 'pangkat_golongan_id');
    }

    public function suku(): BelongsTo
    {
        return $this->belongsTo(Suku::class, 'suku_id');
    }

    public function distrik(): BelongsTo
    {
        return $this->belongsTo(Distrik::class, 'distrik_id');
    }

    public function kelurahan(): BelongsTo
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan_id');
    }

    public function jabatan(): BelongsTo
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }

    public function deskripsiTugas(): BelongsTo
    {
        return $this->belongsTo(DeskripsiTugas::class, 'deskripsi_tugas_id');
    }

    public function gelarDepan(): BelongsTo
    {
        return $this->belongsTo(GelarDepan::class, 'gelar_depan_id');
    }

    public function gelarBelakang(): BelongsTo
    {
        return $this->belongsTo(GelarBelakang::class, 'gelar_belakang_id');
    }

    public function gelarNonAkademis(): BelongsTo
    {
        return $this->belongsTo(GelarNonAkademis::class, 'gelar_non_akademis_id');
    }

    public function jenjangPendidikan(): BelongsTo
    {
        return $this->belongsTo(JenjangPendidikan::class, 'jenjang_pendidikan_id');
    }

    public function statusPerkawinan(): BelongsTo
    {
        return $this->belongsTo(StatusPerkawinan::class, 'status_perkawinan_id');
    }

    public function scopeDraft(Builder $query): void
    {
        $query->whereNull('published_at');
    }

    public function scopePublished(Builder $query): void
    {
        $query->whereNotNull('published_at');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
