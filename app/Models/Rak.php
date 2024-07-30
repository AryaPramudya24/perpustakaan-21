<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rak extends Model
{
    protected $primaryKey = 'kd_rak';

    protected $table = 'rak';
    protected $fillable = [
        'lokasi',
    ];

    public function dataTambahanBuku(){
        return $this->hasOne(Rak::class,'kd_rak');
    }
}
