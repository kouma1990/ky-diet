<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        if(!App::environment("local")){
            $this->call("MasterSeeder");
        } else {
            $this->call("MasterSeeder");
            $this->call("TestSeeder");
        }

        Model::reguard();
    }
}
