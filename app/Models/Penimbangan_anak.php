<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penimbangan_anak extends Model
{
    use HasFactory;
    protected $table = 'penimbangan_anak';
    protected $fillable = [
        'id_timbang',
        'id_dha',
        'id_anak',
        'id_vaksin',
        'nama_anak',
        'tanggal_posyandu_bayibalita',
        'id_jadwal',
        'jk',
        'berat_badan',
        'st',
        'ket'
    ];
    protected $primaryKey = 'id_timbang';
    public $incrementing = false;
    protected $keyType= 'string';
    public function daftarhadir() {
        return $this->belongsTo(Daftar_hadirbayi::class, 'id_dha');
    }
    public function bayibalita() {
        return $this->belongsTo(Bayibalita::class, 'id_anak');
    }
    public function vaksin() {
        return $this->belongsTo(Vaksin_anak::class, 'id_vaksin');
    }
    public function jadwal() {
        return $this->belongsTo(Jadwal::class, 'id_jadwal');
    }
}
