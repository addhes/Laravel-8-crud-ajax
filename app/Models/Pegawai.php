<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;

    protected $table = "pegawai";

    protected $fillable = [
        'nama', 'bonus',
    ];

    public function pembayaran(){
        return $this->belongsToMany('App\Models\Pembayaran');
    }
}