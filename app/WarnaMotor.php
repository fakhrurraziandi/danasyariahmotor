<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class WarnaMotor extends Model
{

    use Eloquence;

    protected $table = 'warna_motor';
    protected $fillable = [
        'name',
        'slug',
    ];

    protected $searchableColumns = [
        'name',
        'slug',
    ];
}
