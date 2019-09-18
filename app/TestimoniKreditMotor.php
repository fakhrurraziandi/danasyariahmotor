<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class TestimoniKreditMotor extends Model
{
    use Eloquence;
    protected $table = 'testimoni_kredit_motor';
    protected $fillable = [
        'pengajuan_kredit_motor_id',
        'pesan_testimoni',
        'rate'
    ];

    protected $searchableColumns = [
        'pengajuan_kredit_motor_id',
        'pesan_testimoni',
        'rate'
    ];
}
