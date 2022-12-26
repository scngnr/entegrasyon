<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('en_products', function (Blueprint $table) {
          $table->id();
          $table->string("status")->nullable();
          $table->string("name")->nullable();
          $table->string("price")->nullable();
          $table->string("regularPrice")->nullable();
          $table->string("category")->nullable();
          $table->string("tax")->nullable();
          $table->string("currency")->nullable();
          $table->string("description")->nullable();
          $table->string("stockCode")->nullable();
          $table->string("gtin")->nullable();
          $table->string("pictures")->nullable();
          $table->string("pictures2")->nullable();
          $table->string("pictures3")->nullable();
          $table->string("pictures5")->nullable();
          $table->string("pictures4")->nullable();
          $table->string("deci")->nullable();
          $table->string("stock")->nullable();
          $table->string("varyation")->nullable();
          $table->string("source")->nullable();
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
        Schema::dropIfExists('en_products');
    }
}
