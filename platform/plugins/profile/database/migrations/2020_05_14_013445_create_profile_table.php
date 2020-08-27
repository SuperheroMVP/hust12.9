<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 120);
            $table->string('diachi', 255)->nullable();
            $table->string('description', 400)->nullable();
            $table->text('content')->nullable();
            $table->integer('author_id');
            $table->integer('khoa_id');
            $table->string('chucvu', 120)->nullable();
            $table->string('loai', 120)->nullable();
            $table->string('email', 120)->nullable();
            $table->string('sdt', 120)->nullable();
            $table->string('facebook', 120)->nullable();
            $table->string('zalo', 120)->nullable();
            $table->string('instagram', 120)->nullable();
            $table->string('author_type', 255)->default(addslashes(User::class));
            $table->tinyInteger('is_featured')->unsigned()->default(0);
            $table->string('image', 255)->nullable();
            $table->integer('views')->unsigned()->default(0);
            $table->string('format_type', 30)->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
