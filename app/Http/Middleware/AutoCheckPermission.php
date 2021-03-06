<?php

namespace App\Http\Middleware;

use App\Models\Permission;
use Closure;
use Illuminate\Http\Request;

class AutoCheckPermission
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
        $routeName = $request->route()->getName();
        $permission = Permission::whereRaw("FIND_IN_SET ('$routeName', route)")->first();
        if ($permission) {
            if (!$request->user()->can($permission->name)) {
                abort(403);
            }
        }
        return $next($request);
    }
}
