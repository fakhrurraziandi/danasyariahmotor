<?php

namespace App;

use App\User;
use Sofa\Eloquence\Eloquence;
use App\PengajuanPembiayaanDana;
use Illuminate\Database\Eloquent\Model;

class WithdrawCart extends Model
{
    use Eloquence;
    protected $table = 'withdraw_cart';
    protected $fillable = [
        'user_id',
        'pengajuan_pembiayaan_dana_id'
    ];
    protected $searchableColumns = [
        'user_id',
        'pengajuan_pembiayaan_dana_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function pengajuan_pembiayaan_dana()
    {
        return $this->belongsTo(PengajuanPembiayaanDana::class, 'pengajuan_pembiayaan_dana_id', 'id');
    }
}
