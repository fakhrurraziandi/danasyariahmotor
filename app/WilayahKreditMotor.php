<?php

namespace App;

use App\CsKreditMotor;
use App\SpvKreditMotor;
use App\TestimoniGallery;
use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class WilayahKreditMotor extends Model
{
    use Eloquence;
    
    protected $table = 'wilayah_kredit_motor';
    protected $fillable = ['name'];
    protected $searchableColumns = ['name'];

    public function cs_kredit_motor()
    {
        return $this->belongsToMany(CsKreditMotor::class, 'cs_kredit_motor_wilayah_kredit_motor', 'wilayah_kredit_motor_id', 'cs_kredit_motor_id');
    }

    public function spv_kredit_motor()
    {
        return $this->belongsToMany(SpvKreditMotor::class, 'spv_kredit_motor_wilayah_kredit_motor', 'wilayah_kredit_motor_id', 'spv_kredit_motor_id');
    }

    public function testimoni_gallery()
    {
        return $this->hasMany(TestimoniGallery::class, 'wilayah_kredit_motor_id', 'id');
    }
}
