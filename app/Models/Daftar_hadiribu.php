<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftar_hadiribu extends Model
{
    use HasFactory;
    protected $table = 'daftar_hadiribu';
    protected $fillable = [
        'id_dhi',
        'id_ibu',
        'id_jadwal',
        'nama_ibu',
        'status',
        'ket'
    ];
    protected $primaryKey = 'id_dhi';
    public $incrementing = false;
    protected $keyType= 'string';
    public function ibu() {
        return $this->belongsTo(Ibuhamil::class, 'id_ibu');
    }
    public function pemeriksaan() {
        return $this->hasMany(Pemeriksaan_ibu::class, 'id_dhi');
    }
    public function jadwal() {
        return $this->belongsTo(Jadwal::class, 'id_jadwal');
    }
}
