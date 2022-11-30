<?php
namespace App\Services;
use App\Badge;
use App\Notifications\GotNewBadge;
use App\Repositories\UserRepository;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserService
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository=$repository;
    }

    public function store($data){
        $user =  User::create([
            'name' => $data['name'],
            'account_name'=>$data['account_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return  $user;
    }
}
