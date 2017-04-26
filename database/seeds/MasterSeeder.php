<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\UserSetting;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("users")->delete();
        $user = User::create([
            "name" => "kouma",
            "email" => "kouma1990@gmail.com",
            "password" => Hash::make("password"),
        ]);
        $color = mt_rand(0,255).','.mt_rand(0,255).','.mt_rand(0,255);
        UserSetting::create([
           'color' => $color,
           'default_chart' => 0,
           'user_id' => $user->id
        ]);
    }
}
