<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $table = 'data';
    protected $guarded = [];

    public function sektor(){
        return $this->belongsTo(Sektor::class, 'id_sektor', 'id');
    }

    public function komoditas(){
        return $this->belongsTo(Komoditas::class, 'id_komoditas', 'id');
    }

    public function klasifikasi(){
        return $this->belongsTo(Klasifikasi::class, 'id_klasifikasi', 'id');
    }
}
