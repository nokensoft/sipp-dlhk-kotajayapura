<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JenisKelamin extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function scopeDraft(Builder $query): void
    {
        $query->whereNull('published_at');
    }

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at');
    }
    use HasFactory,SoftDeletes;

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }
}
