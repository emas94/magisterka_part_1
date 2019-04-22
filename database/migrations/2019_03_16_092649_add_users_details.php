<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUsersDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users',function (Blueprint $table)
        {
            $table->string('login')->unique();
           $table->string('lastname');
            $table->string('telefon');
            $table->string('status');
           $table->string('funkcja');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users',function (Blueprint $table)
        {
            $table->dropColumn('login');
            $table->dropColumn('lastname');
            $table->dropColumn('telefon');
            $table->dropColumn('status');
            $table->dropColumn('funkcja');

        });
    }
}
