<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class SpvKreditMotorWilayahKreditMotor extends Model
{
    use Eloquence;
    protected $table = 'spv_kredit_motor_wilayah_kredit_motor';
    protected $fillable = ['spv_kredit_motor_id', 'wilayah_kredit_motor_id'];
    protected $searchableColumns = ['spv_kredit_motor_id', 'wilayah_kredit_motor_id'];
}
