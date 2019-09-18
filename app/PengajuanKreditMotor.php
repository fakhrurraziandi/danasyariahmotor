<?php

namespace App;

use App\User;
use App\CsKreditMotor;
use App\SpvKreditMotor;
use App\WilayahKreditMotor;
use App\AngsuranMotorDetail;
use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class PengajuanKreditMotor extends Model
{
	
	use Eloquence;

    protected $table = 'pengajuan_kredit_motor';
    protected $fillable = [
        'user_id', 
        'wilayah_kredit_motor_id',
    	'angsuran_motor_id', 
    	'angsuran_motor_detail_id', 
    	'cs_kredit_motor_id', 
    	'cs_kredit_motor_status', 
    	'spv_kredit_motor_id',
    	'spv_kredit_motor_status',
    ];

    protected $searchableColumns = [
        'user_id', 
        'wilayah_kredit_motor_id',
    	'angsuran_motor_id', 
    	'angsuran_motor_detail_id', 
    	'cs_kredit_motor_id', 
    	'cs_kredit_motor_status', 
    	'spv_kredit_motor_id',
    	'spv_kredit_motor_status',
    ];

    public $with = ['user', 'cs_kredit_motor', 'spv_kredit_motor', 'angsuran_motor', 'wilayah_kredit_motor'];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function cs_kredit_motor()
    {
        return $this->belongsTo(CsKreditMotor::class, 'cs_kredit_motor_id', 'id');
    }

    public function spv_kredit_motor()
    {
        return $this->belongsTo(SpvKreditMotor::class, 'spv_kredit_motor_id', 'id');
    }

    public function angsuran_motor_detail()
    {
        return $this->belongsTo(AngsuranMotorDetail::class, 'angsuran_motor_detail_id', 'id');   
    }

    public function angsuran_motor()
    {
        return $this->belongsTo(AngsuranMotor::class, 'angsuran_motor_id', 'id');
    }

    public function wilayah_kredit_motor()
    {
        return $this->belongsTo(WilayahKreditMotor::class, 'wilayah_kredit_motor_id', 'id');
    }

    public function testimoni_kredit_motor()
    {
        return $this->hasMany(TestimoniKreditMotor::class, 'pengajuan_kredit_motor_id', 'id');
    }
}
