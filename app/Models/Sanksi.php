<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sanksi extends Model
{
    use HasFactory;
    protected $table ='sanksi';

    protected $fillable = [
        'id_anggota',
        'id_peminjaman',
        'jumlah_denda',
        'email',
        'status'
    ];
}
