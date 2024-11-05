<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'jurnal_transaksi';


    protected $fillable = [
        'kode_jurnal',
        'keterangan',
        'tanggal',
        'kode_rekening',
        'uraian_transaksi',
        'kel_tujuan',
        'tujuan',
        'referensi',
        'pemasok',
        'department',
        'debet',
        'kredit',
    ];

    protected $dates = ['tanggal'];
}
