<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //esta tabla es la que contendrá la información del API
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->String("title");
            $table->String("genre");
            $table->String("author");
            $table->String("publisher");
            $table->Integer("year");
            $table->String("cover");
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
        Schema::dropIfExists('books');
    }
}
