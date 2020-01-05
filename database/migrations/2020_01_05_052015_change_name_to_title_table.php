<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeNameToTitleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kashikaris', function (Blueprint $table) {
            $table->renameColumn('name', 'title');
            $table->string('pic1')->nullable()->change();
            $table->string('pic2')->nullable()->change();
            $table->string('pic3')->nullable()->change();
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
            $table->renameColumn('title', 'name');
            $table->string('pic1')->nullable(false)->change();
            $table->string('pic2')->nullable(false)->change();
            $table->string('pic3')->nullable(false)->change();
        });
    }
}
