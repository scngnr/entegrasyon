<?php


use Illuminate\Support\Facades\Route;
use Automattic\WooCommerce\Client;


Route::get('parasutCategoyCreateOrUpdate', [Scngnr\Mdent\CategoryService\Http\Controllers\ParasutCategoryController::class, 'parasutCategoyCreateOrUpdate'] );
