<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WhatsappNotificationImage extends Model
{
    public $timestamps = false;
    protected $table = 'whatsapp_notification_images';
    protected $fillable = [
        'whatsapp_notification_id',
        'base64_string'
    ];
}
