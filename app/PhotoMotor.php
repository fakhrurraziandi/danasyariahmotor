<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class PhotoMotor extends Model
{
    use Eloquence;

    protected $table = 'photo_motor';
    protected $fillable = [
        'motor_id',
        'photo',
    ];

    protected $searchableColumns = [
        'motor_id',
        'photo',
    ];
}
