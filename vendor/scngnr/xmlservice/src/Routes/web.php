<?php


use Illuminate\Support\Facades\Route;
use Scngnr\Xmlservice\Models\XmlService;

Route::middleware(['web', 'auth'])->prefix('/xmlservice')->group(function(){
  // | ---------------------------------   front-End  ---------------------------------------------------------------------- |

  Route::get('/', function(){
    $xmlList = XmlService::all();
    $toplamUrunAdeti = 0;
    for ($i=0; $i < count($xmlList); $i++) {
      $toplamUrunAdeti = $toplamUrunAdeti + $xmlList[$i]['xmlUrunAdet'];
    }
    return view('view::xmldashboard', ['xmlList' => $xmlList, 'toplamUrunAdeti' => $toplamUrunAdeti]); });

  Route::get('/edit/{id}', function($id){
    $productSpect = new \Scngnr\Product\Product;
    return view('view::xmledit', ['productSpect' => $productSpect->productIndex(), 'xmlInfo' => XmlService::find($id)]);
  });
  // Route::get('/manuel-start/{id}', [Scngnr\Xmlservice\Http\Controllers\XmlController::class, 'manuelXmlProductCheck']);   //yeni xml ekle
  //Route::get('/xmlProductCheck', [Scngnr\Xmlservice\Http\Controllers\XmlController::class, 'xmlProductCheck']);   //yeni xml ekle


  //  |---------------------------------   Back-End  ----------------------------------------------------------------------|
  Route::post('/add', [Scngnr\Xmlservice\Http\Controllers\XmlAdd::class, 'xmlAdd']);                               //yeni xml ekle, key value tara veritabanına kayıt et.
  // Route::post('/add/keylist/{id}', [Scngnr\Xmlservice\Http\Controllers\XmlController::class, 'xmlKeyListAdd']);    //Ürün tanımlamalarını (isim, stok, fiyat, adet gibi) veritabanına kayıt et.
  Route::get('/manuel-start/{id}', [Scngnr\Xmlservice\Http\Controllers\XmlAddProduct::class, 'XmlAddProduct']);    //Ürünleri tara ve Product sınıfını kullanarak veritabanına kayııt et.
  // Route::get('/delete/{id}', [Scngnr\Xmlservice\Http\Controllers\XmlController::class, 'databaseXmlDelete']);      //Xmli veri tabanından sil.
  // Route::get('/kategori/fiyat/add/{kategori}/{magza}/{magzaId}/{fiyat}/{islem}/{formul}/{product}', [Scngnr\Xmlservice\Http\Controllers\XmlController::class, 'kategoriFiyatAdd']);   //kategori fiyat ekle
  // Route::post('/xmlEditInfo/{id}', [Scngnr\Xmlservice\Http\Controllers\XmlController::class, 'xmlEditInfo']);      //Xml Bilgilerini Düzenle
});
