<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \Carbon\Carbon;

class CreateNovelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('novels', function (Blueprint $table) {
            $table->id();
            $table->string('Novel_name');
            $table->string('Author', 100)->nullable()->default('Unknown');
            $table->date('Release_date')->default(Carbon::now());
            $table->BigInteger('Novel_type_id');
            $table->string('Image', 200)->nullable();
            $table->string('Slug');
            $table->longText('Summary')->nullable();
            $table->BigInteger('View')->unsigned();
            $table->BigInteger('Follower')->unsigned();
            $table->smallInteger('Rating')->unsigned()->nullable()->default(0);
            $table->smallInteger('Chapter')->unsigned();           
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
        Schema::dropIfExists('novel');
    }
}
