<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalKirim extends Model
{
    use HasFactory;
    protected $table = 'table_jadwals';
    protected $primaryKey = 'id';
    protected $fillable = [
        'jadwal_pengiriman'
        ,'no_resi'
        ,'id_driver'
        ,'id_paket'
        ,'id_customer'
        ,'created_by'
        ,'updated_by'
    ];
}
