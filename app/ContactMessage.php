<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use Eloquence;

    protected $table = 'contact_message';
    
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'message'
    ];

    protected $searchableColumns = [
        'name',
        'email',
        'phone_number',
        'message'
    ];
}
