<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function changePasswordForm()
    {
        $this->authorize('changePassword', User::class);

        return view('student.changepassword');
    }

    public function changePassword(Request $request)
    {
        $this->authorize('changePassword', User::class);

        $request->validate([
            'old_password' => ['required', 'string'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ]);

        try{

            if(Hash::check($request->old_password, auth('admin')->user()->password)){
                auth()->user()->update(['password' => $request->password]);
                return redirect()->back()->with('success', 'Password Change Succesfully');
            }

            return redirect()->back()->with('error', 'Unable to Change Password');

        }catch(Exception $ex){
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show(User $user)
    {
        $this->authorize('view', $user);
        return view('student.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', $user);

        $departments = Department::all();
        return view('student.edit', compact('user', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('update', $user);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'department_id' => ['required', 'numeric'],
            'dob' => ['required', 'date'],
            'gender' => ['required', 'string'],
            'level' => ['required', 'string'],
        ]);

        try{
            $user->update([
                'name' => $request->name,
                'department_id' => $request->department_id,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'level' => $request->level
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
    public function destroy($id)
    {
        //
    }
}
