<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class StatusBpkb extends Model
{
    use Eloquence;
    
    protected $table = 'status_bpkb';
    protected $fillable = ['name'];
    protected $searchableColumns = ['name'];
}
