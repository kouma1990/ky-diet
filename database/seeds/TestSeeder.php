<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\UserSetting;
use App\Models\DietData;
use App\Models\Room;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = User::create([
            "name" => "y",
            "email" => "yyy@gmail.com",
            "password" => Hash::make("password"),
        ]);
        $color = mt_rand(0,255).','.mt_rand(0,255).','.mt_rand(0,255);
        UserSetting::create([
           'color' => $color,
           'default_chart' => 0,
           'user_id' => $user1->id
        ]);
        
        $user2 = User::create([
            "name" => "k",
            "email" => "ttt@gmail.com",
            "password" => Hash::make("password"),
        ]);
        
        $color = mt_rand(0,255).','.mt_rand(0,255).','.mt_rand(0,255);
        UserSetting::create([
           'color' => $color,
           'default_chart' => 0,
           'user_id' => $user2->id
        ]);
        
        $user3 = User::create([
            "name" => "x",
            "email" => "xxx@gmail.com",
            "password" => Hash::make("password"),
        ]);
        
        $color = mt_rand(0,255).','.mt_rand(0,255).','.mt_rand(0,255);
        UserSetting::create([
           'color' => $color,
           'default_chart' => 0,
           'user_id' => $user3->id
        ]);
        
        DietData::create(["date"=>"2017-04-01", "weight"=>"65.0", "user_id"=>1]);
        DietData::create(["date"=>"2017-04-02", "weight"=>"65.2", "user_id"=>1]);
        DietData::create(["date"=>"2017-04-03", "weight"=>"65.3", "user_id"=>1]);
        DietData::create(["date"=>"2017-04-04", "weight"=>"65.2", "user_id"=>1]);
        DietData::create(["date"=>"2017-04-05", "weight"=>"65.1", "user_id"=>1]);
        DietData::create(["date"=>"2017-04-06", "weight"=>"65.0", "user_id"=>1]);
        DietData::create(["date"=>"2017-04-07", "weight"=>"65.4", "user_id"=>1]);
        DietData::create(["date"=>"2017-04-08", "weight"=>"65.4", "user_id"=>1]);
        DietData::create(["date"=>"2017-04-09", "weight"=>"65.5", "user_id"=>1]);
        
        DietData::create(["date"=>"2017-04-11", "weight"=>"64.7", "user_id"=>2]);
        DietData::create(["date"=>"2017-04-12", "weight"=>"65.1", "user_id"=>2]);
        DietData::create(["date"=>"2017-04-14", "weight"=>"65.2", "user_id"=>2]);
        DietData::create(["date"=>"2017-04-15", "weight"=>"65.1", "user_id"=>2]);
        DietData::create(["date"=>"2017-04-16", "weight"=>"65.0", "user_id"=>2]);
        DietData::create(["date"=>"2017-04-18", "weight"=>"64.8", "user_id"=>2]);
        DietData::create(["date"=>"2017-04-19", "weight"=>"64.6", "user_id"=>2]);
        
        DietData::create(["date"=>"2017-04-11", "weight"=>"57.7", "user_id"=>3]);
        DietData::create(["date"=>"2017-04-12", "weight"=>"56.5", "user_id"=>3]);
        DietData::create(["date"=>"2017-04-14", "weight"=>"55.8", "user_id"=>3]);
        DietData::create(["date"=>"2017-04-15", "weight"=>"55.6", "user_id"=>3]);
        DietData::create(["date"=>"2017-04-16", "weight"=>"55.4", "user_id"=>3]);
        DietData::create(["date"=>"2017-04-18", "weight"=>"54.8", "user_id"=>3]);
        DietData::create(["date"=>"2017-04-19", "weight"=>"54.2", "user_id"=>3]);
    
        DietData::create(["date"=>"2017-04-11", "weight"=>"60.3", "user_id"=>4]);
        DietData::create(["date"=>"2017-04-12", "weight"=>"60.6", "user_id"=>4]);
        DietData::create(["date"=>"2017-04-14", "weight"=>"61.4", "user_id"=>4]);
        DietData::create(["date"=>"2017-04-15", "weight"=>"61.6", "user_id"=>4]);
        DietData::create(["date"=>"2017-04-16", "weight"=>"61.4", "user_id"=>4]);
        DietData::create(["date"=>"2017-04-18", "weight"=>"62.2", "user_id"=>4]);
        DietData::create(["date"=>"2017-04-19", "weight"=>"62.8", "user_id"=>4]);
        
        $room1 = Room::create(["room_name"=>"test room1", "admin_user_id" => 1]);
        $room2 = Room::create(["room_name"=>"test room2", "admin_user_id" => 2]);
        $room3 = Room::create(["room_name"=>"test room3", "admin_user_id" => 3]);
        $room1->users()->attach([1, 2]);
        $room2->users()->attach([1, 2, 3]);
        $room3->users()->attach([2, 3, 4]);
    }
}
