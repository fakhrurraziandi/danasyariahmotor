<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Laravolt\Indonesia\Models\Village;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use Eloquence;
    
    protected $table = 'indonesia_districts';
    protected $fillable = ['name'];
    protected $searchableColumns = ['name'];

    public function villages()
    {
        return $this->hasMany(Village::class, '');
    }
}
