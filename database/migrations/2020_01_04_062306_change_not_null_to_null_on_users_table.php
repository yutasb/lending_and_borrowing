<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNotNullToNullOnUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('myfav')->nullable()->change();
            $table->string('myself')->nullable()->change();
            $table->string('pic')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('myfav')->nullable(false)->change();
            $table->string('myself')->nullable(false)->change();
            $table->string('pic')->nullable(false)->change();
        });
    }
}
