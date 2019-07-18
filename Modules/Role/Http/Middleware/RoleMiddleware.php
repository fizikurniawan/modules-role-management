<?php

namespace Modules\Role\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Modules\Role\Entities\Role;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        if (Role::checkRole($role)) {
            return $next($request);
        }
        return abort(401, 'Maaf anda tidak diperkenankan mengakses halaman ini');
    }
}
