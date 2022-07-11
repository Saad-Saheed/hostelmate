<?php

namespace App\Policies;

use App\Models\Hostel;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class HostelPolicy
{
    use HandlesAuthorization;

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
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $admin, Hostel $hostel)
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
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $admin, Hostel $hostel)
    {
        return auth('admin')->check();
    }

    /**
     * Determine whether the admin can delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $admin, Hostel $hostel)
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
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $admin, Hostel $hostel)
    {
        //
    }

    /**
     * Determine whether the admin can permanently delete the model.
     *
     * @param  \App\Models\Admin  $admin
     * @param  \App\Models\Hostel  $hostel
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $admin, Hostel $hostel)
    {
        //
    }
}
