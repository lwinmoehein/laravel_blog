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
            "name"=>"မေးသူ",
            "description"=>"မေးခွန်းတစ်ခုကို မေးသည့်အတွက် ရပါသည်။"
        ]);
        Achievement::create([
            "name"=>"ဖြေကြားသူ",
            "description"=>"အဖြေတစ်ခုအား စတင်ဖြေသည့်အတွက်ရပါသည်။"
        ]);
        Achievement::create([
            "name"=>"တော်သည့်ဖြေကြားသူ",
            "description"=>"အဖြေတစ်ခုတွင် upvote 10 ခု ရသည့်အတွက် ရပါသည်။"
        ]);
        Achievement::create([
            "name"=>"တော်သည့် မေးသူ",
            "description"=>"မေးခွန်း တစ်ခုတွင် upvote 10 ခု ရသည့်အတွက် ရပါသည်။"
        ]);
        Achievement::create([
            "name"=>"စိတ်၀င်စားစရာမေးသူ",
            "description"=>"မေးခွန်းတစ်ခုတွင် ဖြေကြားသူ 10 ယောက်ရှိသည့်အတွက်ရပါသည်။"
        ]);
        Achievement::create([
            "name"=>"အမှန်ဖြေသူ",
            "description"=>"မိမိအဖြေအား မေးခွန်းမေးသူမှ အမှန်အဖြစ်သတ်မှတ်ခံရသည့်အတွက် ရပါသည်။"
        ]);
    }
}
