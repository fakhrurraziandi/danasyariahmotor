<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Sofa\Eloquence\Eloquence;

class Admin extends Authenticatable
{
    use Notifiable;
    use Eloquence;

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

    
    
}
