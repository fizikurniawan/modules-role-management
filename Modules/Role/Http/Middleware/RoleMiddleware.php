<?php

namespace Modules\Role\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\Role\Entities\Role;
use Modules\Role\Entities\RolePermission;
use Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check() && Auth::user()->role_id){
            if(Auth::user()->role){
                return $next($request);
            }else{
                return abort(401, 'Maaf anda tidak diperkenankan mengakses halaman ini');
            }
        }
        
        return abort(401, 'Maaf anda tidak diperkenankan mengakses halaman ini');
    }
}
