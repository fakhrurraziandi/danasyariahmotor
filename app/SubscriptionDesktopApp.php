<?php

namespace App;

use App\User;
use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class SubscriptionDesktopApp extends Model
{

    use Eloquence;
    protected $table = 'subscription_desktop_app';
    protected $fillable = [

        'user_id', 
        'subscription_duration', 
        'price', 
        'description',  
        'bukti_transaksi',
        'nama_bank',
        'no_rekening',
        'nama_rekening',
        'subscription_approved_at', 
        'subscription_expired_at', 
        'status', 
    ];

    public $with = ['user'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
