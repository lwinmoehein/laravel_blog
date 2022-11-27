<?php

namespace App\Repositories;

use App\Achievement;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\DB;

class AchievementRepository
{
    public function isExist($user_id,$achievement_id)
    {
       $achievement =  DB::table('achievement_user')->where('user_id',$user_id)->where('achievement_id',$achievement_id)->get()->first();

       return $achievement!=null ;
    }

    public function getByNameOrNull($name){
        return Achievement::where('name',$name)->get()->first();
    }
}
