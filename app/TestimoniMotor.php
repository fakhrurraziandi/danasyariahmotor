<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class TestimoniMotor extends Model
{
    use Eloquence;

    protected $table = 'testimoni_motor';
    protected $fillable = [
        'motor_id',
        'name',
        'rate',
        'message'
    ];

    public function motor()
    {
        return $this->belongsTo(Motor::class, 'motor_id', 'id');
    }
}
