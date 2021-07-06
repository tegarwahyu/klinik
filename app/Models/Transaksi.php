<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'obat_id',
        'umur',
        'berat_badan',
        'tinggi_badan',
        'keluhan',
        'kode_transaksi',
        'status',
        'bukti',
        'jumlah_yang_dibayar',
        'jumlah_obat',
    ];

    public function data_user()
    {
        return $this->hasMany('App\Models\User', 'id');
    }

    public function data_obat()
    {
        return $this->hasMany('App\Models\Obat', 'id');
    }

}
