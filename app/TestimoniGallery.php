<?php

namespace App;

use App\WilayahKreditMotor;
use Sofa\Eloquence\Eloquence;
use App\WilayahPembiayaanDana;
use Illuminate\Database\Eloquent\Model;

class TestimoniGallery extends Model
{
    use Eloquence;

    protected $table = 'testimoni_gallery';
    
    protected $fillable = [
        'name',
        'message',
        'photo',
        'type',
        'wilayah_pembiayaan_dana_id',
        'wilayah_kredit_motor_id'
    ];

    protected $searchableColumns = [
        'name',
        'message',
        'photo',
        'type',
        'wilayah_pembiayaan_dana_id',
        'wilayah_kredit_motor_id'
    ];

    public function wilayah_pembiayaan_dana()
    {
        return $this->belongsTo(WilayahPembiayaanDana::class, 'wilayah_pembiayaan_dana_id', 'id');
    }
    public function wilayah_kredit_motor()
    {
        return $this->belongsTo(WilayahKreditMotor::class, 'wilayah_kredit_motor_id', 'id');
    }
}
