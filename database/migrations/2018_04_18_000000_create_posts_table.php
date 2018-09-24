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
        if (!Schema::hasTable('posts')) {
            Schema::create('posts', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('author_id');
                $table->integer('category_id')->nullable();
                $table->string('title');
                $table->string('meta_title')->nullable();
                $table->text('excerpt');
                $table->text('body');
                $table->string('image')->nullable();
                $table->string('slug')->unique();
                $table->text('meta_description')->nullable();
                $table->text('meta_keywords')->nullable();
                $table->enum('status', ['PUBLISHED', 'DRAFT', 'PENDING'])->default('DRAFT');
                $table->boolean('featured')->default(0);
                $table->text('tags')->nullable();
                $table->text('layout')->nullable();
                $table->timestamps();
                $table->timestamp('published_date')->nullable()->useCurrent = true;
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
