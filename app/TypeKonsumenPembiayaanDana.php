<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class TypeKonsumenPembiayaanDana extends Model
{
    use Eloquence;

    protected $table = 'type_konsumen_pembiayaan_dana';
    protected $fillable = ['name'];
    protected $searchableColumns = ['name'];
}
