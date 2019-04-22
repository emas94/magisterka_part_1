<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStadionyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stadiony',function (Blueprint $table)
        {
            $table->increments('id');
            $table->string('nazwa')->unique();
            $table->string('adres')->unique();
            $table->integer('liczbamiejsc');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stadiony');
    }
}
