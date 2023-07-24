<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = 'jadwal';
    
    protected $fillable = [
        'id_jadwal',
        'tanggal_posyandu_bayibalita',
        'tanggal_posyandu_ibuhamil',
        'bulan'
    ];
    protected $primaryKey = 'id_jadwal';
    public $incrementing = false;
    protected $keyType= 'string';
    public function daftar_hadir() {
        return $this->hasMany(Daftar_hadirbayi::class, 'id_jadwal');
    }
    public function penimbangan() {
        return $this->hasMany(Penimbangan_anak::class, 'id_jadwal');
    }
    public function daftar_hadiribu() {
        return $this->hasMany(Daftar_hadiribu::class, 'id_jadwal');
    }
    public function pemeriksaann() {
        return $this->hasMany(Pemeriksaan_ibu::class, 'id_jadwal');
    }
}
