<?php

namespace App;

use App\SpvPembiayaanDana;
use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class WilayahPembiayaanDana extends Model
{
    use Eloquence;
    
    protected $table = 'wilayah_pembiayaan_dana';
    protected $fillable = ['name'];
    protected $searchableColumns = ['name'];

    public function cs_pembiayaan_dana()
    {
        return $this->belongsToMany(CsPembiayaanDana::class, 'cs_pembiayaan_dana_wilayah_pembiayaan_dana', 'wilayah_pembiayaan_dana_id', 'cs_pembiayaan_dana_id');
    }

    public function spv_pembiayaan_dana()
    {
        return $this->belongsToMany(SpvPembiayaanDana::class, 'spv_pembiayaan_dana_wilayah_pembiayaan_dana', 'wilayah_pembiayaan_dana_id', 'spv_pembiayaan_dana_id');
    }

    public function testimoni_gallery()
    {
        return $this->hasMany(TestimoniGallery::class, 'wilayah_pembiayaan_dana_id', 'id');
    }
}
