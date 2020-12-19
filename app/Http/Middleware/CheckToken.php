<?php

namespace App\Http\Middleware;

use App\Http\classes\G;
use Closure;

class CheckToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->bearerToken() == null || $request->header('Action') == null) {
            return response(['statusText' => 'fail', "description" => "action or token is not set"], 406);
        }
        $token = $request->bearerToken();
        $check = G::checkToken($token, true, $request->header('Action'));
        if ($check['status'] == false) {
            return response(['statusText' => 'fail', "meessage" => $check['meessage']], 403);
        }
        if ($request->route()->getName() != $request->header('Action')) {
            return response(['statusText' => 'fail', "meessage" => "permission denid"], 403);
        }
        return $next($request);
    }
}
