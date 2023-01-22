<?php


use Illuminate\Support\Facades\Route;
use Automattic\WooCommerce\Client;


Route::get('schedule/run', function(){

   Artisan::call("schedule:run");
});
//




// Route::middleware(['auth:sanctum', 'verified'])->get('/pazaryeri/n11/urungonder', [Controllers\Pazaryeri\N11\ProductController::class, 'saveProduct']);
// Route::middleware(['auth:sanctum', 'verified'])->post('/pazaryeri/n11/databaseattributesave', [Controllers\Pazaryeri\N11\ProductController::class, 'databaseAttributeSave']);
// Route::middleware(['auth:sanctum', 'verified'])->get('/pazaryeri/n11/orders/check', [Controllers\OrdersController::class, 'n11OrdersCheck']);
//
// Route::middleware(['auth:sanctum', 'verified'])->get('/pazaryeri/hepsiburada/orders/check', [Controllers\OrdersController::class, 'HepsiBuradaOrdersCheck']);
// Route::middleware(['auth:sanctum', 'verified'])->get('/pazaryeri/hepsiburada/katalog/hizli-urun-gonder', [Controllers\Pazaryeri\Hepsiburada\KatalaogController::class, 'hizliKatalogEntegrasyonu']);
// Route::middleware(['auth:sanctum', 'verified'])->get('/pazaryeri/hepsiburada/katalog/productcheck', [Controllers\Pazaryeri\Hepsiburada\ProductController::class, 'productCheck']);
// Route::middleware(['auth:sanctum', 'verified'])->get('/pazaryeri/hepsiburada/katalog/eslesen-urun-guncelle', [Controllers\Pazaryeri\Hepsiburada\ProductController::class, 'eslesenUrunGuncelle']);
//
//
// Route::middleware(['auth:sanctum', 'verified'])->get('/pazaryeri/trendyol/orders/check', [Controllers\OrdersController::class, 'trendyolOrderCheck']);
// Route::middleware(['auth:sanctum', 'verified'])->get('/pazaryeri/trendyol/urunguncelle', [Controllers\PazaryeriKontroller::class, 'trendyolUpdateStokPrice']);
//
// Route::middleware(['auth:sanctum', 'verified'])->get('/pazaryeri/trendyol/Category/markacheck',  [Controllers\Pazaryeri\Trendyol\CategoryController::class, 'MarkaCheck']);
// Route::middleware(['auth:sanctum', 'verified'])->get('/pazaryeri/trendyol/Category/kategorycheck',  [Controllers\Pazaryeri\Trendyol\CategoryController::class, 'KategoryCheck']);
