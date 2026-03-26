<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AwigRule extends Model
{
    use HasFactory;

    protected $table = 'awig_rules';
    protected $fillable = ['bab', 'judul', 'isi'];
}
