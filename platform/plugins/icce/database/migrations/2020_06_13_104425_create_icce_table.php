<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIcceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('icces', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 120);
            $table->string('image1', 120)->nullable();
            $table->string('image2', 120)->nullable();
            $table->string('image3', 120)->nullable();
            $table->string('image4', 120)->nullable();
            $table->string('image5', 120)->nullable();
            $table->string('image6', 120)->nullable();
            $table->string('image7', 120)->nullable();
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
        Schema::dropIfExists('icces');
    }
}
