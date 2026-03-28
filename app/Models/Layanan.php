<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'nama',
        'category',
        'subtitle',
        'short_description',
        'deskripsi',
        'image',
        'jadwal',
        'lokasi',
        'telepon',
        'email',
        'services',
        'requirements',
    ];

    protected $casts = [
        'services' => 'json',
        'requirements' => 'json',
    ];
}
