<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNotNullToNullTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kashikaris', function (Blueprint $table) {
            $table->string('title')->nullable()->change();
            $table->string('category_id')->nullable()->change();
            $table->string('place')->nullable()->change();
            $table->string('price')->nullable()->change();
            $table->string('comment')->nullable()->change();
            $table->string('user_id')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kashikaris', function (Blueprint $table) {
            $table->string('title')->nullable(false)->change();
            $table->string('category_id')->nullable(false)->change();
            $table->string('place')->nullable(false)->change();
            $table->string('price')->nullable(false)->change();
            $table->string('comment')->nullable(false)->change();
            $table->string('user_id')->nullable(false)->change();
        });
    }
}
