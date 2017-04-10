<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Models\DietData;

class TestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            "name" => "y",
            "email" => "yyy@gmail.com",
            "password" => Hash::make("password"),
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
        
        DietData::create(["date"=>"2017-04-01", "weight"=>"64.7", "user_id"=>2]);
        DietData::create(["date"=>"2017-04-02", "weight"=>"65.1", "user_id"=>2]);
        DietData::create(["date"=>"2017-04-04", "weight"=>"65.2", "user_id"=>2]);
        DietData::create(["date"=>"2017-04-05", "weight"=>"65.1", "user_id"=>2]);
        DietData::create(["date"=>"2017-04-06", "weight"=>"65.0", "user_id"=>2]);
        DietData::create(["date"=>"2017-04-08", "weight"=>"64.8", "user_id"=>2]);
        DietData::create(["date"=>"2017-04-09", "weight"=>"64.6", "user_id"=>2]);
    }
}
