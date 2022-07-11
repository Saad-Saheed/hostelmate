<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
// use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;

class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function __invoke(Request $request)
    {
        $title = "Admin email verification prompt";
        $emailVerificationPromptRoute = "admin.verification.send";
        $logoutRoute = "admin.logout";

        return $request->user('admin')->hasVerifiedEmail()
                    ? redirect()->intended('admin/dashboard')
                    // intended(RouteServiceProvider::HOME)
                    : view('auth.verify-email', compact('title', 'logoutRoute', 'emailVerificationPromptRoute'));
    }
}
