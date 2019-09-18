<?php

namespace App;

use App\Wilayah;
use App\SpvPembiayaanDana;
use App\WilayahPembiayaanDana;
use Sofa\Eloquence\Eloquence;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CSPembiayaanDana extends Authenticatable
{
    use Notifiable;
    use Eloquence;

    protected $table = 'cs_pembiayaan_dana';

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

    public function wilayah_pembiayaan_dana()
    {
        return $this->belongsToMany(WilayahPembiayaanDana::class, 'cs_pembiayaan_dana_wilayah_pembiayaan_dana', 'cs_pembiayaan_dana_id', 'wilayah_pembiayaan_dana_id');
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
