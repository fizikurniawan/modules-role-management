<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Modules\Role\Entities\Role;
use Modules\Role\Entities\RolePermission;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role(){
        return $this->belongsTo('\Modules\Role\Entities\Role');
    }

    public function canPermission($role){
        $permissions = RolePermission::where('role_id', $this->role_id)->get();
        
        foreach($permissions as $p)
        {
            if($p->permission == $role)
            {
                return true;
            }
        }
        return false;
    }

    public function getPermissions(){
        $permissions = RolePermission::where('role_id', $this->role_id)->get();
        return $permissions;
    }
}
