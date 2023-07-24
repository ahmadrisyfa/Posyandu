<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ibuhamil extends Model
{
    use HasFactory;
    protected $table = 'ibuhamil';
    protected $fillable = [
        'id_ibu',
        'nik_ibu',
        'no_kk',
        'nama_ibu',
        'tgl_lahir',
        'hamil_ke',
        'hpht',
        'nama_suami',
        'alamat',
        'kia',
        'ket'
    ];
    
    protected $primaryKey = 'id_ibu';
    public $incrementing = false;
    protected $keyType= 'string';
    public function Daftar_hadiribu() {
        return $this->hasMany(Daftar_hadiribu::class, 'id_ibu');
    }
    public function ibuhamil() {
        return $this->hasMany(Pemeriksaan_ibu::class, 'id_ibu');
    }
}
