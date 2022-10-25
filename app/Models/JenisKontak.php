<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisKontak extends Model
{
    use HasFactory;
    protected $fillable = [
        "jenis_kontak"

    ];
    protected $table = 'jenis_kontak';
    public function JenisKontak(){
        return $this->belongsToMany('App\Models\JenisKontak');
    }
}
