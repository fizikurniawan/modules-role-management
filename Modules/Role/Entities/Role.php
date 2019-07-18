<?php

namespace Modules\Role\Entities;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [];

    public function user()
    {
        return $this->belongsToMany('App\User');
    }

    public function permissions(){
        return $this->hasMany('\Modules\Role\Entities\RolePermission');
    }
}
