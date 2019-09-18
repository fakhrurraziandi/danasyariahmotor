<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class KategoriSpesifikasi extends Model
{
    use Eloquence;
    
    protected $table = 'kategori_spesifikasi';

    protected $fillable = [
        'name'
    ];

    protected $searchableColumns = [
        'name'
    ];
}
