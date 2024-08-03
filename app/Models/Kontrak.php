<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kontrak extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = ['id'];

    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }

    public function scopeDraft(Builder $query): void
    {
        $query->whereNull('published_at');
    }

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at');
    }

    public function pegawai()
    {
        return $this->hasMany(Pegawai::class);
    }
}
