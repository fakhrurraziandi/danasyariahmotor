<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use Eloquence;
    
    protected $table = 'indonesia_cities';
    protected $fillable = ['name'];
    protected $searchableColumns = ['name'];
}
