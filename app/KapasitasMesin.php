<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class KapasitasMesin extends Model
{

    use Eloquence;

    protected $table = 'kapasitas_mesin';
    protected $fillable = [
        'cc',
    ];

    protected $searchableColumns = [
        'cc',
    ];
}
