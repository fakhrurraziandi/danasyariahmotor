<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use Eloquence;

    public $timestamps = false;
    
    protected $table = 'faq';
    protected $fillable = ['question', 'answer'];
    protected $searchableColumns = ['question', 'answer'];
}
