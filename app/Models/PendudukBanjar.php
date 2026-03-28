<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendudukBanjar extends Model
{
    use HasFactory;

    protected $table = 'penduduk_banjar';
    protected $fillable = ['jumlah_laki_laki', 'jumlah_perempuan'];
}
