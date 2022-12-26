<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pazaryeri_product_infos', function (Blueprint $table) {
          $table->id();
          $table->text('productId')->nullable();
          $table->text('magzaId')->nullable();
          $table->text('categoryId')->nullable();
          $table->text('categoryAttribue')->nullable();
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
        Schema::dropIfExists('pazaryeri_product_infos');
    }
};
