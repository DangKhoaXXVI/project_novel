<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('incategory', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('category');
            $table->foreign('novel_id')->references('id')->on('novel');             
        });

        Schema::table('chapter', function (Blueprint $table) {
            $table->foreign('novel_id')->references('id')->on('novel');             
        });

        Schema::table('novel', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');      
            $table->foreign('type_id')->references('id')->on('type');
            $table->foreign('category_id')->references('id')->on('category');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foreign_keys');
    }
}
