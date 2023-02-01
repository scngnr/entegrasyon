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
        Schema::create('en_orders_details', function (Blueprint $table) {
          $table->id();
          $table->string('orderId');
          $table->string('billingAddress');
          $table->string('shippingAddress');
          $table->string('wp_customerId');
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
        Schema::dropIfExists('en_orders_details');
    }
};
