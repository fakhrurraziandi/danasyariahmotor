<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class Wilayah extends Model
{
    use Eloquence;
    protected $table = 'wilayah';
    protected $fillable = [
        'name'
    ];
    protected $searchableColumns = [
        'name'
    ];

    public function angsuran_motor_header()
    {
        return $this->belongsToMany(AngsuranMotorHeader::class, 'angsuran_motor_header_wilayah', 'wilayah_id', 'angsuran_motor_header_id');
    }

    public function users_cs_kredit_motor()
    {
        return $this->hasMany(User::class, 'cs_kredit_motor_wilayah_id', 'id');
    }
}
