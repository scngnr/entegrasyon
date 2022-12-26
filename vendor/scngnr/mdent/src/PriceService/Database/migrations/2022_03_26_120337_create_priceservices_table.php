<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceservicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('priceservices', function (Blueprint $table) {
            $table->id();
            $table->string('urunId');
            $table->string('woocommercefiyati')->nullable();
            $table->string('ideasoftFiyati')->nullable();
            $table->string('platinSoftFiyati')->nullable();
            $table->string('shopifyFiyati')->nullable();
            $table->string('tsoftFiyati')->nullable();
            $table->string('ticimaxFiyati')->nullable();
            $table->string('csFiyati')->nullable();
            $table->string('epttAvmFiyati')->nullable();
            $table->string('ggFiyati')->nullable();
            $table->string('hepsiBuradaFiyati')->nullable();
            $table->string('n11Fiyati')->nullable();
            $table->string('trendyolFiyati')->nullable();

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
        Schema::dropIfExists('priceservices');
    }
}
