<?php

namespace App;

use App\TypeMotor;
use App\WarnaMotor;
use App\PabrikanMotor;
use App\JenisTransmisi;
use App\KapasitasMesin;
use App\JenisPembakaran;
use App\SpesifikasiMotor;
use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class Motor extends Model
{
    use Eloquence;

    protected $table = 'motor';
    protected $fillable = [
        'name',
        'slug',
        'pabrikan_motor_id',
        'type_motor_id',
        'jenis_transmisi_id',
        'jenis_pembakaran_id',
        'kapasitas_mesin_id',
        'tahun',
        'harga',
        'fitur',

    ];

    protected $searchableColumns = [
        'name',
        'slug',
        'tahun',
    ];

    public function pabrikan_motor()
    {
        return $this->belongsTo(PabrikanMotor::class, 'pabrikan_motor_id', 'id');
    }

    public function type_motor()
    {
        return $this->belongsTo(TypeMotor::class, 'type_motor_id', 'id');
    }

    public function jenis_transmisi()
    {
        return $this->belongsTo(JenisTransmisi::class, 'jenis_transmisi_id', 'id');
    }

    public function kapasitas_mesin()
    {
        return $this->belongsTo(KapasitasMesin::class, 'kapasitas_mesin_id', 'id');
    }

    public function jenis_pembakaran()
    {
        return $this->belongsTo(JenisPembakaran::class, 'jenis_pembakaran_id', 'id');
    }

    public function warna_motor()
    {
        return $this->belongsToMany(WarnaMotor::class, 'motor_warna_motor', 'motor_id', 'warna_motor_id');
    }

    public function getWarnaMotorIdsAttribute()
    {
        $warna_motor_ids = [];
        foreach($this->warna_motor as $warna_motor){
            $warna_motor_ids[] = $warna_motor->id;
        }

        return $warna_motor_ids;
    }

    public function photo_motor()
    {
        return $this->hasMany(PhotoMotor::class, 'motor_id', 'id');
    }

    public function angsuran_motor()
    {
        return $this->hasMany(AngsuranMotor::class, 'motor_id', 'id');
    }

    public function testimoni_motor()
    {
        return $this->hasMany(TestimoniMotor::class, 'motor_id', 'id');
    }

    public function spesifikasi_motor()
    {
        return $this->hasMany(SpesifikasiMotor::class, 'motor_id', 'id');
    }

    protected $appends = ['has_discount_dp', 'angsuran_motor_with_biggest_discount_dp'];

    public function getHasDiscountDpAttribute()
    {
        return AngsuranMotor::where('motor_id', $this->id)->max('discount_dp') ? 1 : 0;
    }

    public function getAngsuranMotorWithBiggestDiscountDpAttribute()
    {
        return AngsuranMotor::where('motor_id', $this->id)->orderBy('discount_dp', 'DESC')->first();
    }




}
