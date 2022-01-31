<?php

namespace App\Policies;

use App\Models\Box;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class BoxPolicy
{
    use HandlesAuthorization;


    /**
     * Определить, может ли пользователь обновить коробку.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Post  $post
     * @return bool
     */
    // public function update(User $user)
    // {
    //     $box = Box::where('name', $boxName)->first();

    //     return $user->id === $box->user()->id;
    // }
}
