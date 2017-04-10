<?php

use Illuminate\Database\Seeder;
use App\User;

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
    }
}
