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
        Schema::table('novels', function (Blueprint $table) {
            $table->foreign('Category_id')->references('id')->on('categories');
        });

        Schema::table('topics', function (Blueprint $table) {
            $table->foreign('User_id')->references('id')->on('users');
        });

        Schema::table('chapters', function (Blueprint $table) {
            $table->foreign('Novel_id')->references('id')->on('novels');
        });

        Schema::table('follows', function (Blueprint $table) {
            $table->foreign('User_id')->references('id')->on('users');
            $table->foreign('Novel_id')->references('id')->on('novels');
        });

        Schema::table('topic_comments', function (Blueprint $table) {
            $table->foreign('User_id')->references('id')->on('users');
            $table->foreign('Topic_id')->references('id')->on('topics');
        });

        Schema::table('novel_comments', function (Blueprint $table) {
            $table->foreign('User_id')->references('id')->on('users');
            $table->foreign('Novel_id')->references('id')->on('novels');
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
