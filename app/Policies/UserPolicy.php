<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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

    public function viewAny()
    {
        return auth()->check();
    }

    public function view(User $user)
    {
        return auth()->check() && auth()->user()->id == $user->id;
    }

    public function update(User $user)
    {
        return $user->id == auth()->user()->id;
    }

    public function changePassword(User $user)
    {
        return (auth()->user()->id == $user->id);
    }
}
