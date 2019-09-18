<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MotorWarnaMotor extends Model
{
    protected $table = 'motor_warna_motor';
    protected $fillable = ['motor_id', 'warna_motor_id'];
}
