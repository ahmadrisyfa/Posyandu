<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaksin_anak extends Model
{
    use HasFactory;
    protected $table = 'vaksin_anak';
    protected $guarded = ['id_vaksin'];
    protected $fillable = [
        'id_vaksin',
        'nama_vaksin',
        'ket'
    ];
    protected $primaryKey = 'id_vaksin';
    public $incrementing = false;
    protected $keyType= 'string';
    public function penimbangan_anak() {
        return $this->hasMany(Penimbangan_anak::class, 'id_vaksin');
    }
}
