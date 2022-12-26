<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_services', function (Blueprint $table) {
            $table->id();
            $table->string('adi')->nullable();
            $table->string('email')->nullable();
            $table->string('telefonNo')->nullable();
            $table->string('gonderimAdresi')->nullable();
            $table->string('faturaAdresi')->nullable();
            $table->string('tc')->nullable();
            $table->string('vergiNo')->nullable();
            $table->string('vergiDairesi')->nullable();
            $table->string('city')->nullable();
            $table->string('district')->nullable();
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
        Schema::dropIfExists('customer_services');
    }
}
