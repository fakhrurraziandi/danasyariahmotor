<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class CsPembiayaanDanaWilayahPembiayaanDana extends Model
{
    use Eloquence;
    protected $table = 'cs_pembiayaan_dana_wilayah_pembiayaan_dana';
    protected $fillable = ['cs_pembiayaan_dana_id', 'wilayah_pembiayaan_dana_id'];
    protected $searchableColumns = ['cs_pembiayaan_dana_id', 'wilayah_pembiayaan_dana_id'];
}
