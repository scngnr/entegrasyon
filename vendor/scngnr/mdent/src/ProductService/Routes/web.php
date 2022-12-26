<?php


use Illuminate\Support\Facades\Route;
use Automattic\WooCommerce\Client;


Route::get('ProductService/list', [Scngnr\Mdent\ProductService\Http\Controllers\create::class, 'index'] );
Route::get('ProductService/create', [Scngnr\Mdent\ProductService\Http\Controllers\create::class, 'parasutProductCreate'] );
Route::get('ProductService/delete', [Scngnr\Mdent\ProductService\Http\Controllers\delete::class, 'allDelete'] );
