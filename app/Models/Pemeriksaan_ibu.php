<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan_ibu extends Model
{
    use HasFactory;
    protected $table = 'pemeriksaan_ibu';
    protected $fillable = [
        'id_periksa',
        'id_dhi',
        'id_ibu',
        'id_vaksin',
        'id_jadwal',
        'tanggal_posyandu_ibuhamil',
        'berat_badan',
        'tinggi_badan',
        'lila_imt',
        'hb_goldarah',
        'tensi',
        'id_obat',
        'jumlah',
        'ket'
    ];
    
    protected $primaryKey = 'id_periksa';
    
    public $incrementing = false;
    protected $keyType= 'string';
    public function daftarhadiribu() {
        return $this->belongsTo(Daftar_hadiribu::class, 'id_dhi');
    }
    public function ibuhamil() {
        return $this->belongsTo(Ibuhamil::class, 'id_ibu');
    }
    public function vaksin() {
        return $this->belongsTo(Vaksin_ibu::class, 'id_vaksin');
    }
    public function jadwal() {
        return $this->belongsTo(Jadwal::class, 'id_jadwal');
    }
    public function obat() {
        return $this->belongsTo(Obat::class, 'id_obat');
    }
}
