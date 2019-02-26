<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id', 'products_categories_id_foreign')->references('id')->on('categories');
            $table->integer('code');
            $table->float('price');
            $table->float('old-price')->nullable();
            $table->boolean('availability');
            $table->string('brand');
            $table->text('description');
            $table->integer('views')->default(1);
            $table->string('image');
            $table->boolean('is_new')->default(0);
            $table->string('language');
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

        Schema::dropIfExists('products');
    }
}
