<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Sofa\Eloquence\Eloquence;

class SpvKreditMotor extends Authenticatable
{
    use Notifiable;
    use Eloquence;

    protected $table = 'spv_kredit_motor';

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
        'userId',
    ];

    protected $searchableColumns = [
        'name', 
        'email', 
        'password',
        'phone_number',
        'photo_profile',
        'userId',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function wilayah_kredit_motor()
    {
        return $this->belongsToMany(WilayahKreditMotor::class, 'spv_kredit_motor_wilayah_kredit_motor', 'spv_kredit_motor_id', 'wilayah_kredit_motor_id');
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
