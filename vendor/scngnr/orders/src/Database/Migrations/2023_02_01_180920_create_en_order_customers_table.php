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
        Schema::create('en_order_customers', function (Blueprint $table) {
          $table->id();
          $table->string('firstName');
          $table->string('lastName')->nullable();
          $table->string('company')->nullable();
          $table->string('address')->nullable();
          $table->string('address2')->nullable();
          $table->string('city')->nullable();
          $table->string('state')->nullable();
          $table->string('postCode')->nullable();
          $table->string('country')->nullable();
          $table->string('phone')->nullable();
          $table->string('email')->nullable();
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
        Schema::dropIfExists('en_order_customers');
    }
};
