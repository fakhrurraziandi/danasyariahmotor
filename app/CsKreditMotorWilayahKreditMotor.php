<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class CsKreditMotorWilayahKreditMotor extends Model
{
    use Eloquence;
    protected $table = 'cs_kredit_motor_wilayah_kredit_motor';
    protected $fillable = ['cs_kredit_motor_id', 'wilayah_kredit_motor_id'];
    protected $searchableColumns = ['cs_kredit_motor_id', 'wilayah_kredit_motor_id'];
}
