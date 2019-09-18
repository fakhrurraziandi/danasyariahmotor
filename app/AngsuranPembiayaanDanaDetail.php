<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use App\AngsuranPembiayaanDana;
use App\TempoAngsuranPembiayaanDana;
use Illuminate\Database\Eloquent\Model;

class AngsuranPembiayaanDanaDetail extends Model
{
    use Eloquence;
    protected $table = 'angsuran_pembiayaan_dana_detail';
    protected $fillable = [
        'angsuran_pembiayaan_dana_id',
        'tempo_angsuran_pembiayaan_dana_id',
        'angsuran_per_bulan'
    ];
    protected $searchableColumns = [
        'angsuran_pembiayaan_dana_id',
        'tempo_angsuran_pembiayaan_dana_id',
        'angsuran_per_bulan'
    ];

    public $with = [
        'angsuran_pembiayaan_dana',
        'tempo_angsuran_pembiayaan_dana'
    ];  

    public function angsuran_pembiayaan_dana()
    {
        return $this->belongsTo(AngsuranPembiayaanDana::class, 'angsuran_pembiayaan_dana_id', 'id');
    }

    public function tempo_angsuran_pembiayaan_dana()
    {
        return $this->belongsTo(TempoAngsuranPembiayaanDana::class, 'tempo_angsuran_pembiayaan_dana_id', 'id');
    }

    
}
