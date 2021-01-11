<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    
    protected $table = "pembayaran";

    protected $fillable = [
        'bayar',
    ];
    
    public function pegawai(){
        return $this->belongsToMany('App\Models\Pegawai');
    }
}
