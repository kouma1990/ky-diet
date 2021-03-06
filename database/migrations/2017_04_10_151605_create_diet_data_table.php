<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDietDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diet_data', function (Blueprint $table) {
            $table->increments('id');
            $table->date('date');
            $table->decimal('weight', 4, 1);
            $table->integer("user_id")->unsigned();
            $table->timestamps();
        });
        
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
        Schema::dropIfExists('diet_data');
    }
}
