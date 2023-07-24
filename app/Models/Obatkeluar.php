<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obatkeluar extends Model
{
    use HasFactory;
    protected $table = 'obatkeluar';
    
    protected $fillable = [
        'id_OK',
        'id_obat',
        'tgl_keluar',
        'jumlah',
        'ket'
    ];
    protected $primaryKey = 'id_OK';
    public $incrementing = false;
    public function obatkeluar() {
        return $this->belongsTo(Obat::class, 'id_obat');
    }
    public function obat_keluar() {
        return $this->hasMany(Obatkeluar::class, 'id_obat');
    }
}
