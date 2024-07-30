<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penulis extends Model
{
    protected $primaryKey = 'kd_penulis';

    protected $table = 'penulis';
    protected $fillable = [
        'nama_penulis',
        'tempat_lahir',
        'tgl_lahir',
        'email',
    ];

    public function dataTambahanBuku(){
        return $this->hasOne(Penulis::class,'kd_penulis');
    }
}
