<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLigiDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ligi',function (Blueprint $table) {
            $table->integer('druzyny_id')->unsigned()->nullable();;
            $table->foreign('druzyny_id')->references('id')->on('druzyny');
            $table->integer('stadiony_id')->unsigned()->nullable();;
            $table->foreign('stadiony_id')->references('id')->on('stadiony');
            $table->integer('mecze_id')->unsigned()->nullable();;
            $table->foreign('mecze_id')->references('id')->on('mecze');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ligi',function (Blueprint $table)
        {
            $table->dropColumn('druzyny_id');
            $table->dropColumn('stadiony_id');
            $table->dropColumn('mecze_id');


        });
    }
}
