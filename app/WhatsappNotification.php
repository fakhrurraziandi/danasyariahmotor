<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WhatsappNotification extends Model
{
    protected $table = 'whatsapp_notification';
    protected $fillable = [
        'no_handphone',
        'message',
        'flag'
    ];

    public $appends = ['images'];

    // public function whatsapp_notification_images()
    // {
    //     return $this->hasMany(WhatsappNotificationImage::class, 'whatsapp_notification_id', 'id');
    // }

    public function getImagesAttribute()
    {

        return [];
        
        $images = [];

        $whatsapp_notification_images = WhatsappNotificationImage::where('whatsapp_notification_id', $this->id)->get();
        foreach($whatsapp_notification_images as $image){
            $images[] = $image->base64_string;
        }

        return $images;
    }
}
