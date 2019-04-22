<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDruzynyDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('druzyny',function (Blueprint $table) {
            $table->integer('stadiony_id')->unsigned()->nullable();;
            $table->foreign('stadiony_id')->references('id')->on('stadiony');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('druzyny',function (Blueprint $table)
        {
            $table->dropColumn('stadiony_id');

        });
    }
}
