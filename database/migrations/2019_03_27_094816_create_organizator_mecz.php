<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrganizatorMecz extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizator_mecz', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('mecze_id');
            $table->unsignedInteger('user_id');

            $table->foreign('mecze_id')->references('id')->on('mecze')->onDelete('cascade');
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
        Schema::dropIfExists('organizator_mecz');
    }
}
