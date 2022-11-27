<?php
namespace App\Services;
use App\Achievement;
use App\Repositories\AchievementRepository;
use Illuminate\Support\Facades\DB;
use App\User;

class AchievementService
{

    public function __construct()
    {
    }

    public function storeUserAchievement(User $user,Achievement $achievement){
        return DB::table('achievement_user')->insert(
            array(
                'achievement_id'     =>  $achievement->id,
                'user_id'   =>  $user->id
            )
        );
    }

}
