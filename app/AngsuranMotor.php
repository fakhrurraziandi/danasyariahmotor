<?php

namespace App;

use App\Motor;
use App\AngsuranMotor;
use App\AngsuranMotorDetail;
use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class AngsuranMotor extends Model
{
    use Eloquence;
    
    protected $table = 'angsuran_motor';
    protected $fillable = [
        'motor_id',
        'dp',
        'discount_dp'
    ];
    protected $searchableColumns = [
        'motor_id',
        'dp',
        'discount_dp'
    ];

    protected $appends = ['discount_dp_calculated', 'dp_calculated'];

    public $with = ['angsuran_motor_detail'];

    public function angsuran_motor_detail()
    {
        return $this->hasMany(AngsuranMotorDetail::class, 'angsuran_motor_id', 'id');
    }

    public function motor()
    {
        return $this->belongsTo(Motor::class, 'motor_id', 'id');
    }

    public function getDiscountDpCalculatedAttribute()
    {
        if($this->discount_dp){
            return $this->dp * ($this->discount_dp / 100);
        }
    }

    public function getDpCalculatedAttribute()
    {
        if($this->discount_dp){
            return $this->dp - ($this->dp * ($this->discount_dp / 100));
        }else{
            return $this->dp;
        }
    }
    
}
