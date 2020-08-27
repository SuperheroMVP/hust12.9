<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDevelopmenthistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developmenthistories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 120);
            $table->string('date', 120);
            $table->string('image', 255);
            $table->string('video', 500);
            $table->string('content', 500);
            $table->integer('auth_id');
            $table->integer('order');
            $table->string('status', 60)->default('published');
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
        Schema::dropIfExists('developmenthistories');
    }
}
