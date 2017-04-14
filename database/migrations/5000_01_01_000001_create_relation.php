<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('diet_data', function ($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        
        Schema::table('room_invitations', function ($table) {
           $table->foreign('invited_user_id')->references('id')->on('users')->onDelete('cascade');
           $table->foreign('room_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('diet_data', function ($table) {
            $table->dropForeign(['user_id']);
        });
    }
}
