<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'deskripsi', 'alamat', 'telepon', 'email', 'jam_pelayanan'];

    protected $casts = [
        'jam_pelayanan' => 'json',
    ];
}
