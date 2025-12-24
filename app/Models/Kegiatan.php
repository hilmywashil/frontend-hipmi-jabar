<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Kegiatan extends Model
{
    use HasFactory;

    protected $table = 'kegiatan';

    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'gambar',
        'tanggal_publish',
        'bidang',
        'is_active',
        'is_populer',
    ];

    protected $casts = [
        'tanggal_publish' => 'date',
        'is_active' => 'boolean',
        'is_populer' => 'boolean',
    ];

    // Auto generate slug dari judul
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($kegiatan) {
            if (empty($kegiatan->slug)) {
                $kegiatan->slug = Str::slug($kegiatan->judul);
            }
        });

        static::updating(function ($kegiatan) {
            if ($kegiatan->isDirty('judul')) {
                $kegiatan->slug = Str::slug($kegiatan->judul);
            }
        });
    }

    // Scope untuk kegiatan aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk kegiatan populer
    public function scopePopuler($query)
    {
        return $query->where('is_populer', true);
    }

    // Scope untuk filter berdasarkan bidang
    public function scopeBidang($query, $bidang)
    {
        return $query->where('bidang', $bidang);
    }
    // Di App\Models\Kegiatan.php
public function getGambarUrlAttribute()
{
    if ($this->gambar) {
        return asset('storage/' . $this->gambar);
    }
    return asset('images/hipmi-logo.png');
}

public function getTanggalFormatAttribute()
{
    return $this->tanggal_publish->format('d M Y');
}
}