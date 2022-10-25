<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'nisn',
        'nama',
        'alamat',
        'jk',
        'email',
        'foto',
        'about'
    ];
    protected $table = 'siswa';
    public function kontak(){
        return $this->hasMany('App\Models\Kontak', 'id_siswa');
    }
    public function project(){
        return $this->hasMany('App\Models\Project', 'id_siswa');
    }

}
