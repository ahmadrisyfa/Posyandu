<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Bayibalita extends Model
{
    use HasFactory;
    protected $table = 'bayibalita';
    protected $fillable = [
        'id_anak',
        'nik_anak',
        'no_kk',
        'nama_anak',
        'jk',
        'nama_ayah',
        'tgl_lahir',
        'nama_ibu',
        'alamat',
        'kia',
        'ket',
    ];

    protected $primaryKey = 'id_anak';
    public $incrementing = false;
    protected $dates= ['tgl_lahir'];
    protected $keyType= 'string';
    public function Daftar_hadirbayi() {
        return $this->hasMany(Daftar_hadirbayi::class, 'id_anak');
    }
    public function penimbangan() {
        return $this->hasMany(Penimbangan_anak::class, 'id_anak');
    }

}
