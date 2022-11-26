<?php

use Illuminate\Database\Seeder;
use App\Achievement;

class AchievementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Achievement::create([
            "name"=>"ကျောင်းသားသစ်",
            "description"=>"မေးခွန်းတစ်ခုကို မေးသည့်အတွက်"
        ]);
        Achievement::create([
            "name"=>"ဆရာလေး",
            "description"=>"အဖြေတစ်ခုတွင် upvote 10 ခု ရသည့်အတွက်"
        ]);
        Achievement::create([
            "name"=>"စာဂျပိုး",
            "description"=>"မေးခွန်း ၁၀ ပုဒ်မေးသည့်အတွက်"
        ]);
        Achievement::create([
            "name"=>"ဆရာကြီး",
            "description"=>"အဖြေတစ်ခုတွင် upvote အခု 100 ရသည့်အတွက်"
        ]);
    }
}
