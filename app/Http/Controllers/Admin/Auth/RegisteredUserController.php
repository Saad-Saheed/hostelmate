<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'staff_number' => ['required', 'string', 'max:100', 'unique:admins']
        ]);

        $user = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'staff_number' => strtoupper($request->staff_number),
            'password' => Hash::make($request->password),
        ]);

        // return feedback

        // event(new Registered($user));

        // Auth::guard('admin')->login($user);

        // return redirect()->route('admin.dashboard');

        return redirect()->back()->with('success', 'Staff Created Successfully');
    }
}
