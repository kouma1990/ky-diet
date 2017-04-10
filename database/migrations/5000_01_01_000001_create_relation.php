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
        /*********************************************************************************
        * Warehouse
        **********************************************************************************/
        Schema::table('diet_data', function ($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /*********************************************************************************
        * Warehouse
        **********************************************************************************/
        Schema::table('diet_data', function ($table) {
            $table->dropForeign(['user_id']);
        });
    }
}