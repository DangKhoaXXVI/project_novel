<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNovelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novel', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('novelname');
            $table->string('slug_novelname');
            $table->string('author');
            $table->string('slug_author');
            $table->text('summary');
            $table->bigInteger('novel_views')->unsigned()->default(0);
            $table->bigInteger('type_id')->unsigned();
            $table->bigInteger('category_id')->unsigned();
            $table->integer('state');
            $table->string('image');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('novel');
    }
}
