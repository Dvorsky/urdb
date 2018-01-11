<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 31);
            $table->string('description', 63);
            $table->tinyInteger('status');
            $table->tinyInteger('rating');
            $table->timestamps();
        });

        Schema::table('movies', function (Blueprint $table) {
            $table->unsignedInteger('list_id');

            $table->foreign('list_id')->references('id')->on('user_lists');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
