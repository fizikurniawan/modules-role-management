<?php

namespace Modules\Role\Entities;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function checkRole($role){
        $is_role = self::where(['user_id'=> \Auth::user()->id,'roles'=>$role])->first();
        return $is_role? true : false;
    }
}
