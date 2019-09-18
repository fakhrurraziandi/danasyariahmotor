<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class JenisTransmisi extends Model
{

    use Eloquence;

    protected $table = 'jenis_transmisi';
    protected $fillable = [
        'name',
        'slug',
    ];

    protected $searchableColumns = [
        'name',
        'slug',
    ];
}
