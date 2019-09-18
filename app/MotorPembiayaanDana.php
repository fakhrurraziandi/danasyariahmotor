<?php

namespace App;


use App\PabrikanMotor;
use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class MotorPembiayaanDana extends Model
{
    use Eloquence;

    protected $table = 'motor_pembiayaan_dana';
    protected $fillable = [
        'name',
        'pabrikan_motor_id',
    ];

    protected $searchableColumns = [
        'name',
        'pabrikan_motor_id',
    ];

    public function pabrikan_motor()
    {
        return $this->belongsTo(PabrikanMotor::class, 'pabrikan_motor_id', 'id');
    }


}
