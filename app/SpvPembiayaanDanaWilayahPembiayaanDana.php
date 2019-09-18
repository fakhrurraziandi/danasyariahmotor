<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class SpvPembiayaanDanaWilayahPembiayaanDana extends Model
{
    use Eloquence;
    protected $table = 'spv_pembiayaan_dana_wilayah_pembiayaan_dana';
    protected $fillable = ['spv_pembiayaan_dana_id', 'wilayah_pembiayaan_dana_id'];
    protected $searchableColumns = ['spv_pembiayaan_dana_id', 'wilayah_pembiayaan_dana_id'];
}
