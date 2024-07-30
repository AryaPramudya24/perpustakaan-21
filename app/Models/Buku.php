<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    protected $primaryKey = 'no_buku';

    protected $table = 'buku';
    protected $fillable = [
        'judul',
        'edisi',
        'no_rak',
        'tahun',
        'penerbit',
        'kd_penulis',
    ];

    public function rak(){
        return $this->belongsTo(Rak::class, 'kd_rak');
    }

    public function penulis(){
        return $this->belongsTo(Penulis::class, 'kd_penulis');
    }
}
