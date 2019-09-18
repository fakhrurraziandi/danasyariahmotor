<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Sofa\Eloquence\Eloquence;

class TempoAngsuranMotor extends Model
{
	use Eloquence;

    protected $table = 'tempo_angsuran_motor';
    protected $fillable = [
    	'tempo'
    ];

    protected $searchableColumns = [
    	'tempo'
    ];
}
