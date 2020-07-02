<?php

namespace App\Repositories;


use App\User;
use Illuminate\Support\Facades\Auth;
class UserRepository
{
    /**
     * @return string
     *  Return the model
     */
    public function all()
    {
        return User::all();

    }
    public function get($id){
        return User::find($id);
    }
    public function getCurrentUser(){
        return Auth::user();
    }
}
