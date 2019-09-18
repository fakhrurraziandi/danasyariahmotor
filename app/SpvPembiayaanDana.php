<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use App\ManagerPembiayaanDana;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class SpvPembiayaanDana extends Authenticatable
{
    use Notifiable;
    use Eloquence;

    protected $table = 'spv_pembiayaan_dana';

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
        'manager_pembiayaan_dana_id',
        'photo_profile',
        'userId',
    ];

    protected $searchableColumns = [
        'name', 
        'email', 
        'password',
        'phone_number',
        'manager_pembiayaan_dana_id',
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

    public function manager_pembiayaan_dana()
    {
        return $this->belongsTo(ManagerPembiayaanDana::class, 'manager_pembiayaan_dana_id', 'id');
    }
    
    public function wilayah_pembiayaan_dana()
    {
        return $this->belongsToMany(WilayahPembiayaanDana::class, 'spv_pembiayaan_dana_wilayah_pembiayaan_dana', 'spv_pembiayaan_dana_id', 'wilayah_pembiayaan_dana_id');
    }

    public function getWilayahPembiayaanDanaIdsAttribute()
    {
        $wilayah_pembiayaan_dana_ids = [];

        foreach($this->wilayah_pembiayaan_dana as $wilayah_pembiayaan_dana){
            $wilayah_pembiayaan_dana_ids[] = $wilayah_pembiayaan_dana->id;
        }

        return $wilayah_pembiayaan_dana_ids;
    }
    
}
