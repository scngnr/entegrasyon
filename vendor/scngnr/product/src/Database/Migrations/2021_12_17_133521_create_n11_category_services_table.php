<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateN11CategoryServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('n11_category_services', function (Blueprint $table) {
            $table->id();
            $table->string('categoryId');
            $table->string('categoryName');
            $table->string('parentCategory')->nullable();
            $table->string('parentCategoryId')->nullable();
            $table->string('categoryAttributeList')->nullable();
            $table->string('categoryAttributeValue')->nullable();

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
        Schema::dropIfExists('n11_category_services');
    }
}
