<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategories';
    protected $fillable = ['nama', 'deskripsi', 'jadwal'];

    protected $casts = [
        'jadwal' => 'json',
    ];
}
