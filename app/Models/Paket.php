<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    protected $table = 'table_pakets';
    protected $primaryKey = 'id';
    protected $fillable = [
        'no_resi'
        ,'nama_pengirim'
        ,'alamat_pengirim'
        ,'no_tlpn_pengirim'
        ,'email_pengirim'
        ,'nama_penerima'
        ,'alamat'
        ,'no_tlpn_user'
        ,'email_penerima'
        ,'berat'
        ,'status'
    ];
}
