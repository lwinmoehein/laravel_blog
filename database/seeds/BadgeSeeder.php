<?php

use Illuminate\Database\Seeder;
use App\Badge;

class BadgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        //
        Badge::create([
            "name"=>"Verified User",
            "description"=>"မေးခွန်ုးမေးခြင်း ၊ အဖြေရေးခြင်း ၊ မေးခွန်း နှင့် အဖြေ များကို vote ပေးခြင်းများပြုလုပ်နိုင်ပါသည်။"
        ]);

        Badge::create([
            "name"=>"Flagger",
            "description"=>"မသင့်လျော်သည့် မေးခွန်းနှင့်အဖြေများကို flag ပေးနိုင်ပါသည်။"
        ]);

        Badge::create([
            "name"=>"Moderator",
            "description"=>"မသင့်လျော်သည့် မေးခွန်းနှင့် အဖြေများကို ဖျက်နိုင်ပါသည်။"
        ]);

        Badge::create([
            "name"=>"Guardian",
            "description"=>"မသင့်လျော်သည့် User account များအား ban နိုင်ပါသည်။"
        ]);
    }
}
