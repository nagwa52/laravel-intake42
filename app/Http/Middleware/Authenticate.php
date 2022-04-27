<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    // protected function redirectTo($request)
    // {
    //     if (! $request->expectsJson() && ! Auth::guest()) {
    //         return route('login');
    //     }
    // }
    public function handle($request, Closure $next, ...$guards)
    {
        // $this->authenticate($request, $guards);

        // if ($this->auth->user()) {
        return $next($request);
        // }
        //redirect('login');
    }
}
