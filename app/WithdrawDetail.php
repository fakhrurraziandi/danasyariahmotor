<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class WithdrawDetail extends Model
{
    use Eloquence;
    protected $table = 'withdraw_detail';
    protected $fillable = [
        'id',
        'withdraw_id',
        'pengajuan_pembiayaan_dana_id'
    ];

    protected $searchableColumns = [
        'id',
        'withdraw_id',
        'pengajuan_pembiayaan_dana_id'
    ];

    public function pengajuan_pembiayaan_dana()
    {
        return $this->belongsTo(PengajuanPembiayaanDana::class);
    }
}
