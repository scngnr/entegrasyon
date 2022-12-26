<?php


use Illuminate\Support\Facades\Route;
use Automattic\WooCommerce\Client;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use  Scngnr\Product\Models\N11CategoryService;



Route::prefix('/product')->group( function(){                  //Hesap Ayarları
  Route::get('/',  App\Http\Livewire\productDashboard::class);
  Route::get('/category', Scngnr\Product\Http\Livewire\categoryDashboard::class);

  Route::get('/edit/{id}', Scngnr\Product\Http\Livewire\editProduct::class);

  Route::post('/price/{id}', [Scngnr\Product\Http\Controllers\PriceController::class, 'index']);
  Route::get('check/status/{id}/{status}', [Scngnr\Product\Http\Controllers\PriceController::class, 'checkStatus']);
  Route::get('check/pazaryeri/{pazaryeri}', [Scngnr\Product\Http\Controllers\PriceController::class, 'pazaryeri']);


  // Route::post('status/{id}', [Scngnr\Product\Http\Controllers\PriceController::class, 'status']);
  Route::post('status/{durum}/{products}', [Scngnr\Product\Http\Controllers\PriceController::class, 'multipleStatus']);
  Route::any('/price/{magza}/{magzaId}/{fiyat}/{islem}/{formul}/{product}', [Scngnr\Product\Http\Controllers\PriceController::class, 'index2']);
  Route::post('add/woocommerce/{mazgaId}/{products}', [Scngnr\Product\Http\Controllers\MarketPlaceController::class, 'addMultiWoocommerce']);
  // Route::post('add/woocommerce/{id}', [Scngnr\Product\Http\Controllers\MarketPlaceController::class, 'addWoocommerce']);

  Route::get('/check/category/{pazaryeri}/{data}', function($pazaryeri, $data){

    switch ($pazaryeri) {
      case 'n11' : $response = N11CategoryService::where('categoryName', 'LIKE', '%' . $data . '%')->get(); return $response; break;
    }
  });






});







//////////////////////////  import Exel
Route::get('import/file', function(){  return view('view::file');});
Route::post('import/exel', function(Request $request){
  Excel::import(new UsersImport, $request->file);
      // return redirect()->route('users.index')->with('success', 'User Imported Successfully');
});
