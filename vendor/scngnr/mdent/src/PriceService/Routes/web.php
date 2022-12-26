<?php


use Illuminate\Support\Facades\Route;
use Automattic\WooCommerce\Client;



Route::post('productPriceUpdate/{array}', [Scngnr\Mdent\PriceService\Http\Controllers\PriceServiceController::class, 'productPriceUpdate'] );
Route::get('tests/{array}', [Scngnr\Mdent\PriceService\Http\Controllers\PriceServiceController::class, 'priceForm'] );
