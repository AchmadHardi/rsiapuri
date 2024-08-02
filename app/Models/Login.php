<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    use HasFactory;

    protected $table = 'logins'; // Sesuaikan dengan nama tabel Anda

    // Tentukan kolom yang bisa diisi (fillable) jika diperlukan
    protected $fillable = ['user_id', 'login_time']; // Sesuaikan dengan kolom tabel Anda
}
