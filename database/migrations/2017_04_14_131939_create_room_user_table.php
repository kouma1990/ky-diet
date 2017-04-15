<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->index();
            $table->integer('room_id')->unsigned()->index();
            $table->timestamps();
        });
        
        Schema::table('room_user', function ($table) {
           $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
           $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_user');
    }
}
