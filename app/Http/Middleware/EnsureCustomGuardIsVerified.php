<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\URL;

class EnsureCustomGuardIsVerified
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $guard = null, $redirectToRoute = null)
    {
        if (!$request->user($guard) ||
            ($request->user($guard) instanceof MustVerifyEmail &&
                !$request->user($guard)->hasVerifiedEmail())) {

            //check if the request is an ajax request.
            if ($request->expectsJson()) {
                //send a json response
                return abort(403, 'Your email address is not verified.');
            } else {
                //redirect to verification notice page.
                return Redirect::guest(URL::route($redirectToRoute ?: 'admin.verification.notice'));
            }
        }

        return $next($request);
    }
}
