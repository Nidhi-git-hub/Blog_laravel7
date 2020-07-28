<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->string('mainHead')->nullable();
            $table->string('smallImage')->nullable();
            $table->longText('smallBody')->nullable();
            $table->string('mainImage')->nullable();
            $table->longText('body')->nullable();
            $table->string('codeHead')->nullable();
            $table->longText('codeBody')->nullable();
            $table->longText('codeExample')->nullable();
            $table->string('typoHead')->nullable();
            $table->longText('typoBody')->nullable();
            $table->string('quoteHead')->nullable();
            $table->longText('quoteBody')->nullable();
            $table->string('quoteName')->nullable();
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
        Schema::dropIfExists('blog_posts');
    }
}
