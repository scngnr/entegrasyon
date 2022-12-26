<?php


use Illuminate\Support\Facades\Route;
use Automattic\WooCommerce\Client;


Route::get('customerservice/create', [Scngnr\Mdent\CustomerService\Http\Controllers\customerServices::class, 'create'] );
Route::get('customerservice/parasut/create', [Scngnr\Mdent\CustomerService\Http\Controllers\customerServices::class, 'parasutCustomerCreate'] );
