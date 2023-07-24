<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obatmasuk extends Model
{
    use HasFactory;
    protected $table = 'obatmasuk';
    
    protected $fillable = [
        'id_OM',
        'id_obat',
        'tgl_masuk',
        'tgl_ed',
        'jumlah'
    ];
    protected $primaryKey = 'id_OM';
    public $incrementing = false;
    public function obatmasuk() {
        return $this->belongsTo(Obat::class, 'id_obat');
    }
    public function obat_masuk() {
        return $this->hasMany(Obatmasuk::class, 'id_obat');
    }
}
