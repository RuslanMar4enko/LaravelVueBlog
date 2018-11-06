<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {

            $table->increments('id');
            $table->string('title');
            $table->string('image');
            $table->string('description');
            $table->text('text');
            $table->string('data', 50);
            $table->integer('language_id')->unsigned();
            $table->foreign('language_id', 'articles_language_id_foreign')->references('id')->on('languages');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id', 'articles_categories_id_foreign')->references('id')->on('categories');
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
        Schema::table('articles', function ($table) {

            $table->dropForeign('articles_language_id_foreign');
            $table->dropColumn('language_id');

            $table->dropForeign('articles_categories_id_foreign');
            $table->dropColumn('category_id');


        });
        Schema::dropIfExists('articles');
    }
}
