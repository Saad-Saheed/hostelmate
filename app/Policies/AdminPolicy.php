<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class AdminPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function viewAnyStudent()
    {
        return auth('admin')->check();
    }

        /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function createStudent()
    {
        return Auth::guard('admin')->check();
    }

    public function updateStudent()
    {
        return Auth::guard('admin')->check();
    }


    public function viewAny()
    {
        return auth('admin')->check();
    }

    public function view(Admin $admin)
    {
        return auth('admin')->check() && auth('admin')->user()->id == $admin->id;
    }

    public function update(Admin $admin)
    {
        return Auth::guard('admin')->check()  && ($admin->id == auth('admin')->user()->id);
    }

        /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function changePassword(Admin $user)
    {
        return Auth::guard('admin')->check() && (Auth::guard('admin')->id() == $user->id);
    }


}
