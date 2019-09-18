<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class PabrikanMotor extends Model
{
    use Eloquence;
    protected $table = 'pabrikan_motor';
    protected $fillable = ['name', 'slug', 'logo'];
    protected $searchableColumns = ['name', 'slug'];
}
