<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use Eloquence;
    
    protected $table = 'notifications';
    protected $fillable = [
        'id',
        'type',
        'notifiable_type',
        'notifiable_id',
        'data',
    ];

    protected $searchableColumns = [
        'id',
        'type',
        'notifiable_type',
        'notifiable_id',
        'data',
    ];
}
