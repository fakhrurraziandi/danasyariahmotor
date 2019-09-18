<?php

namespace App;

use App\KategoriSpesifikasi;
use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class SpesifikasiMotor extends Model
{
    use Eloquence;
    
    protected $table = 'spesifikasi_motor';
    protected $fillable = [
        'motor_id',
        'kategori_spesifikasi_id',
        'name',
        'value',
    ];

    protected $searchableColumns = [
        'motor_id',
        'kategori_spesifikasi_id',
        'name',
        'value',
    ];

    public function kategori_spesifikasi()
    {
        return $this->belongsTo(KategoriSpesifikasi::class, 'kategori_spesifikasi_id', 'id');
    }

    public function motor()
    {
        return $this->belongsTo(Motor::class, 'motor_id', 'id');
    }
}
