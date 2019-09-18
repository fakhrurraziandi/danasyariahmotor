<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class TempoAngsuranPembiayaanDana extends Model
{
    use Eloquence;

    protected $table = 'tempo_angsuran_pembiayaan_dana';
    protected $fillable = [
    	'tempo'
    ];

    protected $searchableColumns = [
    	'tempo'
    ];
}
