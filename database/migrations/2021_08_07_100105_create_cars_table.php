<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    Schema::create('cars', function (Blueprint $table) {
        $table->id();
        $table->string ('CarType');
        $table->string ('CarColor');
        $table->string ('CarNumber');
    });
    Schema::table('cars', function (Blueprint $table) {
        $table->bigInteger ('User_id')->unsigned();
        $table->foreign('User_id')->references('User_id')->on('users'); 
    });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}
