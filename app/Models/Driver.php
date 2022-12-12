<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $table = 'table_drivers';
    protected $fillable = [
        'nik',
        'nama_lengkap',
        'plat_nomor',
        'email',
        'alamat'
    ];
}
