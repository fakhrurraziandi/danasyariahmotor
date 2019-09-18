<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;

class ContentVariable extends Model
{
    use Eloquence;
    protected $table = 'content_variable';

    protected $fillable = [
        'key',
        'value_text',
        'value_html',
        'type'
    ];
    protected $searchableColumns = [
        'key',
        'value_text',
        'value_html',
        'type'
    ];

    public function scopeGetValue($query, $value)
    {
        $q = $query->where('key', $value);
        if($q->count()){
            $content_variable = $q->first();
            if($content_variable->type == 'text'){
                return $content_variable->value_text;
            }
            if($content_variable->type == 'html'){
                return $content_variable->value_html;
            }
        }else{
            return false;
        }
    }
}
