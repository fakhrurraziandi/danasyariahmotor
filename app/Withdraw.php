<?php

namespace App;

use App\User;
use App\WithdrawDetail;
use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use Eloquence;
    protected $table = 'withdraw';
    protected $fillable = [
        'id', 
        'user_id',
        'status'
    ];

    protected $searchableColumns = [
        'id', 
        'user_id',
        'status'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function withdraw_detail()
    {
        return $this->hasMany(WithdrawDetail::class);
    }

    public $appends = ['total_profit', 'status_text'];

    public function getStatusTextAttribute()
    {
        switch($this->status){
            case 1:
                return 'Requested';
            break;
            case 2:
                return 'Withdrawn';
            break;
            case 1:
                return 'Rejected';
            break;
        }
    }

    public function getTotalProfitAttribute()
    {
        // dd($this->id);
        $withdraw_details = WithdrawDetail::whereHas('pengajuan_pembiayaan_dana')->with(['pengajuan_pembiayaan_dana'])->where('withdraw_id', $this->id)->get();
        // dd($withdraw_details);
        $total_profit = 0;

        foreach($withdraw_details as $w){
            
            $total_profit += $w->pengajuan_pembiayaan_dana ? $w->pengajuan_pembiayaan_dana->mitra_profit : 0;
        }

        return $total_profit;
    }

}
