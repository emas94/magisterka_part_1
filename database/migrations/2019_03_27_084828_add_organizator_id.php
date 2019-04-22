<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrganizatorId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mecze', function (Blueprint $table){
            $table->integer('organizatorzy_id')->unsigned();
            $table->foreign('organizatorzy_id','mecze_user_id_foreign')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mecze', function (Blueprint $table){

            $table->dropForeign('mecze_user_id_foreign');
        });
    }
}
