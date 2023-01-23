<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth'])->prefix('/pazaryeri')->group(function (){
  Route::prefix('/wordpress')->group(function (){
    Route::prefix('/product')->group(function (){
      Route::get('/statu', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, 'statu']);  //Ürün Doğrudan yükleme yerine yüklü mü kontrol edilir. Yüklü ise Update edilir.

    })
  });
});
