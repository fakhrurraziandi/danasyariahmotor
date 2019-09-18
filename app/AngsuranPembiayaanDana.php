<?php

namespace App;

use App\StatusBpkb;
use App\StatusStnk;
use App\MotorPembiayaanDana;
use Sofa\Eloquence\Eloquence;
use App\WilayahPembiayaanDana;
use App\AngsuranPembiayaanDanaDetail;
use Illuminate\Database\Eloquent\Model;

class AngsuranPembiayaanDana extends Model
{
    use Eloquence;
    protected $table = 'angsuran_pembiayaan_dana';
    protected $fillable = [
        // 'motor_pembiayaan_dana_id',
        // 'wilayah_pembiayaan_dana_id',
        // 'tahun',
        // 'status_stnk_id',
        // 'status_bpkb_id',
        'pencairan'
    ];

    protected $searchableColumns = [
        // 'motor_pembiayaan_dana_id',
        // 'wilayah_pembiayaan_dana_id',
        // 'tahun',
        // 'status_stnk_id',
        // 'status_bpkb_id',
        'pencairan'
    ];

    public $with = [
        // 'motor_pembiayaan_dana',
        // 'status_stnk',
        // 'status_bpkb',
        // 'angsuran_pembiayaan_dana_detail'
    ];

    

    public function angsuran_pembiayaan_dana_detail()
    {
        return $this->hasMany(AngsuranPembiayaanDanaDetail::class, 'angsuran_pembiayaan_dana_id', 'id');
    }

    // public function wilayah_pembiayaan_dana()
    // {
    //     return $this->belongsTo(WilayahPembiayaanDana::class, 'wilayah_pembiayaan_dana_id', 'id');
    // }

    // public function motor_pembiayaan_dana()
    // {
    //     return $this->belongsTo(MotorPembiayaanDana::class, 'motor_pembiayaan_dana_id', 'id');
    // }

    // public function status_stnk()
    // {
    //     return $this->belongsTo(StatusStnk::class, 'status_stnk_id', 'id');
    // }

    // public function status_bpkb()
    // {
    //     return $this->belongsTo(StatusBpkb::class, 'status_bpkb_id', 'id');
    // }

    


}
