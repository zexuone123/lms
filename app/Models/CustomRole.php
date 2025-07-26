<?php

namespace App\Models;

use Spatie\Permission\Models\Role as SpatieRole;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomRole extends SpatieRole
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
}
