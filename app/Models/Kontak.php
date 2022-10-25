<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kontak extends Model{
    use HasFactory;
    protected $fillable = [
        "id_siswa",
        "id_jenis",
        "deskripsi"

    ];

    protected $table = 'Kontak';
    public function siswa(){
        return $this->belongsTo('App\Models\Siswa', 'id');
    }

    public function jeniskontak(){
        return $this->belongsTo('App\Models\JenisKontak', 'id');

    }
}