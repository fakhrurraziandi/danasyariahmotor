<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class StatusStnk extends Model
{
    use Eloquence;
    
    protected $table = 'status_stnk';
    protected $fillable = ['name'];
    protected $searchableColumns = ['name'];
}
