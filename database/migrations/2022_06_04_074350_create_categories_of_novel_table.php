<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesOfNovelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories_of_novel', function (Blueprint $table) {
            $table->integer('Novel_id')->unsigned();
            $table->integer('Category_id')->unsigned();
            $table->timestamps();

            $table->primary(['Novel_id', 'Category_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories_of_novel');
    }
}
