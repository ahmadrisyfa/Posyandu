<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaksin_ibu extends Model
{
    use HasFactory;
    protected $table = 'vaksin_ibu';
    
    protected $fillable = [
        'id_vaksin',
        'nama_vaksin',
        'ket'
    ];
    protected $primaryKey = 'id_vaksin';
    public $incrementing = false;
    protected $keyType= 'string';
    public function pemeriksaan_ibu() {
        return $this->hasMany(Pemeriksaan_ibu::class, 'id_vaksin');
    }
}
