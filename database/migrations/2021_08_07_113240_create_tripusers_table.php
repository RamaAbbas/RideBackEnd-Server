<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tripusers', function (Blueprint $table) {
            $table->id();
            
        });
        Schema::table('tripusers', function (Blueprint $table) {
            $table->bigInteger ('user_id')->unsigned();
            $table->bigInteger ('trip_id')->unsigned();
            $table->foreign('user_id')->references('User_id')->on('users');
            $table->foreign('trip_id')->references('Trip_id')->on('trips');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tripusers');
    }
}
