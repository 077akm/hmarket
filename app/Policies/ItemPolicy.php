<?php

namespace App\Policies;

use App\Models\Document;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ItemPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)//index
    {
        //
    }


    public function view(User $user, Document $item) //show
    {
        //
    }


    public function create(User $user) //create, store
    {

    }


    public function update(User $user, Document $item)
    {
        return ($user->id == $item->user_id) || ($user->role->name != 'user');
    }


    public function delete(User $user, Document $item)
    {
        return ($user->id == $item->user_id) || ($user->role->name != 'user');
    }


    public function restore(User $user, Document $item)
    {
        //
    }


    public function forceDelete(User $user, Document $item)
    {
        //
    }
}
