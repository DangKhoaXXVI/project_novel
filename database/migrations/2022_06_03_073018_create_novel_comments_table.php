<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNovelCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novel_comments', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('Novel_id')->unsigned();
            $table->BigInteger('User_id')->unsigned();
            $table->longText('Content')->nullable();
            $table->boolean('Status')->default(1);
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
        Schema::dropIfExists('novel_comment');
    }
}
