<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParasutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parasuts', function (Blueprint $table) {
            $table->id();
            $table->string('firmaId');
            $table->string('kullaniciMail')->nullable();
            $table->string('KullaniciPassword')->nullable();
            $table->string('clientId')->nullable();
            $table->string('clientSecret')->nullable();
            $table->string('accessToken')->nullable();
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
        Schema::dropIfExists('parasuts');
    }
}
