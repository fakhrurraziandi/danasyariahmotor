<?php

namespace App;

use App\Motor;
use App\PabrikanMotor;
use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class TypeMotor extends Model
{
    use Eloquence;

    protected $table = 'type_motor';
    protected $fillable = ['name', 'slug'];
    protected $searchableColumns = ['name', 'slug'];

    public function motor()
    {
        return $this->hasMany(Motor::class, 'type_motor_id', 'id');
    }
    
}
