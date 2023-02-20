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
        Schema::create('n11get_category_attributes', function (Blueprint $table) {
            $table->id();
            $table->string('attributeId');
            $table->string('name');
            $table->string('mandatory'); 
            $table->string('hata')->nullable();
            $table->string('yedek')->nullable();
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
        Schema::dropIfExists('n11get_category_attributes');
    }
};
