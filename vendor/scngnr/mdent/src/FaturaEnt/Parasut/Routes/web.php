<?php


use Illuminate\Support\Facades\Route;
use Automattic\WooCommerce\Client;


Route::get('product/oauth', [Scngnr\Mdent\FaturaEnt\Parasut\Http\Controllers\Auth::class, 'accesToken'] );

Route::get('cat/list', [Scngnr\Mdent\FaturaEnt\Parasut\Http\Controllers\Category::class, 'index'] );
Route::get('cat/create', [Scngnr\Mdent\FaturaEnt\Parasut\Http\Controllers\Category::class, 'create'] );
Route::get('cat/info/{id}', [Scngnr\Mdent\FaturaEnt\Parasut\Http\Controllers\Category::class, 'info'] );
Route::get('product/list', [Scngnr\Mdent\FaturaEnt\Parasut\Http\Controllers\Product::class, 'index'] );
Route::get('product/efatura', [Scngnr\Mdent\FaturaEnt\Parasut\Http\Controllers\Efatura::class, 'create'] );

Route::get('wptest', [Scngnr\Mdent\pt::class, 'create'] );
