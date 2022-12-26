<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnProductVaryationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('en_product_varyations', function (Blueprint $table) {
          $table->id();
          $table->string("productId")->nullable();
          $table->string("name")->nullable();
          $table->string("stockCode")->nullable();
          $table->string("stock")->nullable();
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
        Schema::dropIfExists('en_product_varyations');
    }
}
