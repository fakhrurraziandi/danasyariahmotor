<?php

namespace App;

use Sofa\Eloquence\Eloquence;
use Illuminate\Database\Eloquent\Model;
use Yajra\Acl\Models\Permission as YajraPermission;

class Permission extends YajraPermission
{
    use Eloquence;

    protected $searchableColumns = ['name', 'slug', 'resource', 'system'];
}
