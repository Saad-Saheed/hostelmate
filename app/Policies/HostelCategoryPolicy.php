<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\HostelCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class HostelCategoryPolicy
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
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Admin $user)
    {
        return auth('admin')->check();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\HostelCategory  $hostelcategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $user, HostelCategory $hostelcategory)
    {
        return auth('admin')->check();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Admin $user)
    {
        return auth('admin')->check();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\HostelCategory  $hostelcategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $user, HostelCategory $hostelcategory)
    {
        return auth('admin')->check();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\HostelCategory  $hostelcategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $user, HostelCategory $hostelcategory)
    {
        return auth('admin')->check();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\HostelCategory  $hostelcategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $user, HostelCategory $hostelcategory)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\HostelCategory  $hostelcategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $user, HostelCategory $hostelcategory)
    {
        //
    }
}
