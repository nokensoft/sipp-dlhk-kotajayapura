<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Wilayah extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'wilayah';
    protected $guarded = ['id'];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }

    public function scopeDraft(Builder $query): void
    {
        $query->whereNull('published_at');
    }

    public function scopePublished($query)
    {
        return $query->whereNotNull('published_at');
    }
}