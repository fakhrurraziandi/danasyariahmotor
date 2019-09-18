<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class StatusRumah extends Model
{
    use Eloquence;
    
    protected $table = 'status_rumah';
    protected $fillable = ['name'];
    protected $searchableColumns = ['name'];
}
