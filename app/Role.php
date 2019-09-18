<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;
use Yajra\Acl\Models\Role as YajraRole;

class Role extends YajraRole
{
    use Eloquence;

    protected $searchableColumns = ['name', 'slug', 'description'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
    }
}
