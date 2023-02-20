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
        Schema::create('n11subcategories', function (Blueprint $table) {
            $table->id();
            $table->string('categoryId');
            $table->string('parentCategoryId');
            $table->string('name');
            $table->string('dailyReq')->nullable();
            $table->string('hata')->nullable();
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
        Schema::dropIfExists('n11subcategories');
    }
};
