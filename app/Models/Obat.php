<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;
    protected $table = 'obat';
    
    protected $fillable = [
        'id_obat',
        'nama_obat',
        'jenis_obat',
        'sisa_obat',
        'tgl_ed',
        'status'
    ];
    protected $primaryKey = 'id_obat';
    public $incrementing = false;
    protected $keyType= 'string';
    public function obatmasuk() {
        return $this->hasMany(Obatmasuk::class, 'id_obat');
    }
    public function obatkeluar() {
        return $this->hasMany(Obatkeluar::class, 'id_obat');
    }
    public function obat() {
        return $this->hasMany(Pemeriksaan_ibu::class, 'id_obat');
    }
    public function obat_masuk() {
        return $this->belongsTo(Obatmasuk::class, 'id_obat');
    }
    public function obat_keluar() {
        return $this->belongsTo(Obatkeluar::class, 'id_obat');
    }
}
