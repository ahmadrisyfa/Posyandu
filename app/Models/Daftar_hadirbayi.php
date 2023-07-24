<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Bayibalita;


class Daftar_hadirbayi extends Model
{
    use HasFactory;
    protected $table = 'daftar_hadirbayi';
    protected $fillable = [
        'id_dha',
        'id_anak',
        'id_jadwal',
        'status',
        'ket'
    ];
    
    protected $primaryKey = 'id_dha';
    public $incrementing = false;
    protected $keyType= 'string';
    public function bayi() {
        return $this->belongsTo(Bayibalita::class, 'id_anak');
    }
    public function penimbangan() {
        return $this->hasMany(Penimbangan_anak::class, 'id_dha');
    }
    public function jadwal() {
        return $this->belongsTo(Jadwal::class, 'id_jadwal');
    }
}
