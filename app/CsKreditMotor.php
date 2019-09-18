<?php

namespace App;

use App\Wilayah;
use App\SpvKreditMotor;
use App\WilayahKreditMotor;
use Sofa\Eloquence\Eloquence;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CSKreditMotor extends Authenticatable
{
    use Notifiable;
    use Eloquence;

    protected $table = 'cs_kredit_motor';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'email', 
        'password',
        'phone_number',
        'photo_profile',
        'spv_kredit_motor_id',
        'userId'
    ];

    protected $searchableColumns = [
        'name', 
        'email', 
        'password',
        'phone_number',
        'photo_profile',
        'spv_kredit_motor_id',
        'userId'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function spv_kredit_motor()
    {
        return $this->belongsTo(SpvKreditMotor::class, 'spv_kredit_motor_id', 'id');
    }

    public function wilayah_kredit_motor()
    {
        return $this->belongsToMany(WilayahKreditMotor::class, 'cs_kredit_motor_wilayah_kredit_motor', 'cs_kredit_motor_id', 'wilayah_kredit_motor_id');
    }

    public function getWilayahKreditMotorIdsAttribute()
    {
        $wilayah_kredit_motor_ids = [];

        foreach($this->wilayah_kredit_motor as $wilayah_kredit_motor){
            $wilayah_kredit_motor_ids[] = $wilayah_kredit_motor->id;
        }

        return $wilayah_kredit_motor_ids;
    }
}
