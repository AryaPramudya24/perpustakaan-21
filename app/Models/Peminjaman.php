<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $table ='peminjaman';

    protected $fillable = [
        'no_buku',
        'id_anggota',
        'tgl_peminjaman',
        'tgl_pengembalian',
        'status'
    ];
}
