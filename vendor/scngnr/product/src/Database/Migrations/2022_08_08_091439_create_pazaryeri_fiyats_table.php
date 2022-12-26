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
        Schema::create('pazaryeri_fiyats', function (Blueprint $table) {
          $table->id();
          $table->text('productId')->nullable();
          $table->text('pazaryeri')->nullable();
          $table->text('magaza')->nullable();
          $table->text('fiyat')->nullable();
          $table->text('fiyatKaynak')->nullable(); //Xml Otomatik fiyat veya Manuel eklenmiş fiyat gibi
          $table->text('indirimliFiyat')->nullable();
          $table->text('indirimliFiyatBaslangic')->nullable();
          $table->text('indirimliFiyatBitis')->nullable();
          $table->text('status')->nullable();
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
        Schema::dropIfExists('pazaryeri_fiyats');
    }
};
