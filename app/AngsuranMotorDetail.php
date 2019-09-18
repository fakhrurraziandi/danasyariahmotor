<?php

namespace App;

use App\AngsuranMotor;
use App\TempoAngsuranMotor;
use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class AngsuranMotorDetail extends Model
{
    use Eloquence;
    
    protected $table = 'angsuran_motor_detail';
    protected $fillable = [
        'angsuran_motor_id',
        'tempo_angsuran_motor_id',
        'angsuran_per_bulan'
    ];
    protected $searchableColumns = [
        'angsuran_motor_id',
        'tempo_angsuran_motor_id',
        'angsuran_per_bulan'
    ];

    public function tempo_angsuran_motor()
    {
        return $this->belongsTo(TempoAngsuranMotor::class, 'tempo_angsuran_motor_id', 'id');
    }

    public function angsuran_motor()
    {
        return $this->belongsTo(AngsuranMotor::class, 'angsuran_motor_id', 'id');
    }
}
