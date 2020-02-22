<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NotNullToNullMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->string('send_data')->nullable()->change();
            $table->string('from_user')->nullable()->change();
            $table->string('to_user')->nullable()->change();
            $table->string('msg')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->string('send_data')->nullable(false)->change();
            $table->string('from_user')->nullable(false)->change();
            $table->string('to_user')->nullable(false)->change();
            $table->string('msg')->nullable(false)->change();
        });
    }
}
