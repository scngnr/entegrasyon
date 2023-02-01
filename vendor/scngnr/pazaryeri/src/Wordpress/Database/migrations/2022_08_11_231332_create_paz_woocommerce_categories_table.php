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
        Schema::create('paz_woocommerce_categories', function (Blueprint $table) {
          $table->id();
          $table->string('magzaId');
          $table->string('catId');
            $table->string('pazaryeriCatId');
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
        Schema::dropIfExists('paz_woocommerce_categories');
    }
};
