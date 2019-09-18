<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class JenisPembakaran extends Model
{

    use Eloquence;

    protected $table = 'jenis_pembakaran';
    protected $fillable = [
        'name',
        'slug',
    ];

    protected $searchableColumns = [
        'name',
        'slug',
    ];
}
