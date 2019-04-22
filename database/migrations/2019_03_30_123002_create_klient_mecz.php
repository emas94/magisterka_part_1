<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKlientMecz extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('klient_mecz', function (Blueprint $table) {
            $table->increments('id');

                $table->unsignedInteger('mecz_id');
                $table->unsignedInteger('klient_id');

                $table->foreign('mecz_id')->references('id')->on('mecze')->onDelete('cascade');
                $table->foreign('klient_id')->references('id')->on('users')->onDelete('cascade');
            });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('klient_mecz');
    }
}
