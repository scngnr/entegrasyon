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
        Schema::create('pazaryeri_infos', function (Blueprint $table) {
            $table->id();
            $table->json('platform')->nullable();
            $table->json('magazaAdi')->nullable();
            $table->json('magazaLink')->nullable();
            $table->json('appKey')->nullable();
            $table->json('secretKey')->nullable();

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
        Schema::dropIfExists('pazaryeri_infos');
    }
};
