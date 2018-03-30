<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('post_id');
            $table->timestamps();
            $table->string('title');
            $table->integer('user_id');
            $table->integer('type')->nullable();
            $table->decimal('latitude', 17, 15);
            $table->decimal('longitude', 17, 15);
            $table->text('content')->nullable();
            $table->float('rating');
            $table->string('image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
