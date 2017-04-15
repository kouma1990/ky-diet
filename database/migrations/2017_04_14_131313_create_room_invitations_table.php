<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_invitations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("status")->unsigned();
            $table->integer("inviting_user_id")->unsigned();
            $table->integer("invited_user_id")->unsigned();
            $table->integer("room_id")->unsigned();
            $table->timestamps();
        });
        
        Schema::table('room_invitations', function ($table) {
           $table->foreign('invited_user_id')->references('id')->on('users')->onDelete('cascade');
           $table->foreign('room_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_invitations');
    }
}
