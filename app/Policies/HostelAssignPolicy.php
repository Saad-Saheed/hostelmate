<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\HostelAssign;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HostelAssignPolicy
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

     /**
     * Determine whether the admin can view any models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Admin $admin)
    {
        return auth('admin')->check();
    }

    /**
     * Determine whether the admin can view the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\HostelAssign  $hostelAssign
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $admin, HostelAssign $hostelAssign)
    {
        return auth('admin')->check();
    }

    /**
     * Determine whether the admin can create models.
     *
     * @param  \App\Models\Admin  $admin
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Admin $admin)
    {
        return auth('admin')->check();
    }

    /**
     * Determine whether the admin can update the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\HostelAssign  $hostelAssign
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $admin, HostelAssign $hostelAssign)
    {
        return auth('admin')->check();
    }

    /**
     * Determine whether the admin can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\HostelAssign  $hostelAssign
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $admin, HostelAssign $hostelAssign)
    {
        return auth('admin')->check();
    }


    public function changeHostel(Admin $admin)
    {
        return auth('admin')->check();
    }
    /**
     * Determine whether the admin can restore the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\HostelAssign  $hostelAssign
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, HostelAssign $hostelAssign)
    {
        //
    }

    /**
     * Determine whether the admin can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\HostelAssign  $hostelAssign
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, HostelAssign $hostelAssign)
    {
        //
    }
}
