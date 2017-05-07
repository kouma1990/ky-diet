<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

use App\User;
use App\Models\UserSetting;

class ExampleTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response = $this->get('/help');
        $response->assertStatus(200);
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response = $this->get('/home');
    }

    public function testAplication()
    {
        $users = factory(User::class, 3)->create()
                                       ->each(function($u) {
                                           $u->user_setting()->save(factory(UserSetting::class)->make(["user_id" => $u->id]));
                                       });

        $response = $this->actingAs($users[0])
                         ->get('/home');
        $response->assertStatus(200);
        $response = $this->actingAs($users[0])
                         ->get('/home/room_list');
        $response->assertStatus(200);
    }
}
