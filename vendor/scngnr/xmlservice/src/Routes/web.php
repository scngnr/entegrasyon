<?php


use Illuminate\Support\Facades\Route;
use Scngnr\Xmlservice\Models\XmlService;

Route::prefix('/xmlservice')->group(function(){

  Route::get('/', function(){ $xmlList = XmlService::all(); return view('view::xmldashboard', ['xmlList' => $xmlList]); });
  Route::get('/edit/{id}', function($id){

    $productSpect = new \Scngnr\Product\Product;

    // $d = XmlService::find($id);
    // $d = json_decode($d->urunBilgileri, 1);
    // $dd = array_keys($d[1]);
    // dd($dd[0]);

    return view('view::xmledit', ['productSpect' => $productSpect->productIndex(), 'xmlInfo' => XmlService::find($id)]);
  });
  Route::post('/add/keylist/{id}', [Scngnr\Xmlservice\Http\Controllers\XmlController::class, 'xmlKeyListAdd']);   //yeni xml ekle
  Route::post('/add', [Scngnr\Xmlservice\Http\Controllers\XmlAdd::class, 'xmlAdd']);   //yeni xml ekle
  Route::post('/xmlEditInfo/{id}', [Scngnr\Xmlservice\Http\Controllers\XmlController::class, 'xmlEditInfo']);   //yeni xml ekle
  Route::get('/delete/{id}', [Scngnr\Xmlservice\Http\Controllers\XmlController::class, 'databaseXmlDelete']);   //yeni xml ekle
  Route::get('/manuel-start/{id}', [Scngnr\Xmlservice\Http\Controllers\XmlController::class, 'manuelXmlProductCheck']);   //yeni xml ekle
  Route::get('/xmlProductCheck', [Scngnr\Xmlservice\Http\Controllers\XmlController::class, 'xmlProductCheck']);   //yeni xml ekle

  Route::get('/kategori/fiyat/add/{kategori}/{magza}/{magzaId}/{fiyat}/{islem}/{formul}/{product}', [Scngnr\Xmlservice\Http\Controllers\XmlController::class, 'kategoriFiyatAdd']);   //kategori fiyat ekle


});
