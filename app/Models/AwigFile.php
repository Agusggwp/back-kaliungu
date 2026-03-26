<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AwigFile extends Model
{
    use HasFactory;

    protected $table = 'awig_files';
    protected $fillable = ['nama_file', 'deskripsi', 'file_path', 'tanggal_upload'];
}
