<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', Admin::class);

        $admins = Admin::all();
        return view('admin.admins', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        $this->authorize('view', $admin);
        return view('admin.show', compact('admin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        $this->authorize('update', $admin);

        return view('admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
        $this->authorize('update', $admin);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'staff_number' => ['required', 'string', 'max:100']
        ]);

        try{
            $admin->update([
                'name' => $request->name,
                'staff_number' => $request->staff_number,
            ]);
            return redirect()->back()->with('success', 'Profile updated Succesfully');

        }catch(Exception $ex){
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }

    public function changePasswordForm()
    {
        $this->authorize('changePassword', Admin::class);

        return view('admin.changepassword');
    }


    public function changePassword(Request $request)
    {
        $this->authorize('changePassword', Admin::class);

        $request->validate([
            'old_password' => ['required', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ]);

        try{

            if(Hash::check($request->old_password, auth('admin')->user()->password)){
                auth('admin')->user()->update(['password' => $request->password]);
                return redirect()->back()->with('success', 'Password Change Succesfully');
            }

            return redirect()->back()->with('error', 'Unable to Change Password');

        }catch(Exception $ex){
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }
}
