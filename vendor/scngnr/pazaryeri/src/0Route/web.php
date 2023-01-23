<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web', 'auth'])->prefix('/pazaryeri')->group(function (){
  Route::prefix('/wordpress')->group(function (){
    Route::prefix('/product')->group(function (){
      Route::get('/index', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Wordpress Yüklü Ürün Listesini Döndürür
      Route::get('/statu', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Ürün Doğrudan yükleme yerine yüklü mü kontrol edilir. Yüklü ise Update edilir.
      Route::get('/delete', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']); //Wordpress Yüklü Ürünü Siler
    });
    Route::prefix('/category')->group(function (){
      Route::get('/index', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Wordpress Yüklü Ürün Listesini Döndürür
      Route::get('/statu', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Ürün Doğrudan yükleme yerine yüklü mü kontrol edilir. Yüklü ise Update edilir.
      Route::get('/delete', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']); //Wordpress Yüklü Ürünü Siler
    });
    Route::prefix('/coupon')->group(function (){
      Route::get('/index', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Wordpress Yüklü Ürün Listesini Döndürür
      Route::get('/statu', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Ürün Doğrudan yükleme yerine yüklü mü kontrol edilir. Yüklü ise Update edilir.
      Route::get('/delete', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']); //Wordpress Yüklü Ürünü Siler
    });
    Route::prefix('/customer')->group(function (){
      Route::get('/index', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Wordpress Yüklü Ürün Listesini Döndürür
      Route::get('/statu', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Ürün Doğrudan yükleme yerine yüklü mü kontrol edilir. Yüklü ise Update edilir.
      Route::get('/delete', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']); //Wordpress Yüklü Ürünü Siler
    });
    Route::prefix('/order')->group(function (){
      Route::get('/index', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Wordpress Yüklü Ürün Listesini Döndürür
      Route::get('/statu', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Ürün Doğrudan yükleme yerine yüklü mü kontrol edilir. Yüklü ise Update edilir.
      Route::get('/delete', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']); //Wordpress Yüklü Ürünü Siler
    });
    Route::prefix('/order-note')->group(function (){
      Route::get('/index', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Wordpress Yüklü Ürün Listesini Döndürür
      Route::get('/statu', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Ürün Doğrudan yükleme yerine yüklü mü kontrol edilir. Yüklü ise Update edilir.
      Route::get('/delete', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']); //Wordpress Yüklü Ürünü Siler
    });
    Route::prefix('/payment-gateway')->group(function (){
      Route::get('/index', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Wordpress Yüklü Ürün Listesini Döndürür
      Route::get('/statu', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Ürün Doğrudan yükleme yerine yüklü mü kontrol edilir. Yüklü ise Update edilir.
      Route::get('/delete', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']); //Wordpress Yüklü Ürünü Siler
    });
    Route::prefix('/product-attribute')->group(function (){
      Route::get('/index', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Wordpress Yüklü Ürün Listesini Döndürür
      Route::get('/statu', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Ürün Doğrudan yükleme yerine yüklü mü kontrol edilir. Yüklü ise Update edilir.
      Route::get('/delete', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']); //Wordpress Yüklü Ürünü Siler
    });
    Route::prefix('/productattribute-term')->group(function (){
      Route::get('/index', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Wordpress Yüklü Ürün Listesini Döndürür
      Route::get('/statu', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Ürün Doğrudan yükleme yerine yüklü mü kontrol edilir. Yüklü ise Update edilir.
      Route::get('/delete', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']); //Wordpress Yüklü Ürünü Siler
    });
    Route::prefix('/product-reviews')->group(function (){
      Route::get('/index', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Wordpress Yüklü Ürün Listesini Döndürür
      Route::get('/statu', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Ürün Doğrudan yükleme yerine yüklü mü kontrol edilir. Yüklü ise Update edilir.
      Route::get('/delete', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']); //Wordpress Yüklü Ürünü Siler
    });
    Route::prefix('/product-shipping-class')->group(function (){
      Route::get('/index', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Wordpress Yüklü Ürün Listesini Döndürür
      Route::get('/statu', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Ürün Doğrudan yükleme yerine yüklü mü kontrol edilir. Yüklü ise Update edilir.
      Route::get('/delete', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']); //Wordpress Yüklü Ürünü Siler
    });
    Route::prefix('/product-tag')->group(function (){
      Route::get('/index', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Wordpress Yüklü Ürün Listesini Döndürür
      Route::get('/statu', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Ürün Doğrudan yükleme yerine yüklü mü kontrol edilir. Yüklü ise Update edilir.
      Route::get('/delete', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']); //Wordpress Yüklü Ürünü Siler
    });
    Route::prefix('/product-variations')->group(function (){
      Route::get('/index', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Wordpress Yüklü Ürün Listesini Döndürür
      Route::get('/statu', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Ürün Doğrudan yükleme yerine yüklü mü kontrol edilir. Yüklü ise Update edilir.
      Route::get('/delete', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']); //Wordpress Yüklü Ürünü Siler
    });
    Route::prefix('/refunds')->group(function (){
      Route::get('/index', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Wordpress Yüklü Ürün Listesini Döndürür
      Route::get('/statu', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Ürün Doğrudan yükleme yerine yüklü mü kontrol edilir. Yüklü ise Update edilir.
      Route::get('/delete', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']); //Wordpress Yüklü Ürünü Siler
    });
    Route::prefix('/reports')->group(function (){
      Route::get('/index', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Wordpress Yüklü Ürün Listesini Döndürür
      Route::get('/statu', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Ürün Doğrudan yükleme yerine yüklü mü kontrol edilir. Yüklü ise Update edilir.
      Route::get('/delete', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']); //Wordpress Yüklü Ürünü Siler
    });
    Route::prefix('/setting-options')->group(function (){
      Route::get('/index', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Wordpress Yüklü Ürün Listesini Döndürür
      Route::get('/statu', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Ürün Doğrudan yükleme yerine yüklü mü kontrol edilir. Yüklü ise Update edilir.
      Route::get('/delete', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']); //Wordpress Yüklü Ürünü Siler
    });
    Route::prefix('/shipping-methohods')->group(function (){
      Route::get('/index', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Wordpress Yüklü Ürün Listesini Döndürür
      Route::get('/statu', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Ürün Doğrudan yükleme yerine yüklü mü kontrol edilir. Yüklü ise Update edilir.
      Route::get('/delete', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']); //Wordpress Yüklü Ürünü Siler
    });
    Route::prefix('/Shipping-zone-locations')->group(function (){
      Route::get('/index', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Wordpress Yüklü Ürün Listesini Döndürür
      Route::get('/statu', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Ürün Doğrudan yükleme yerine yüklü mü kontrol edilir. Yüklü ise Update edilir.
      Route::get('/delete', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']); //Wordpress Yüklü Ürünü Siler
    });
    Route::prefix('/Shipping-zone-methods')->group(function (){
      Route::get('/index', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Wordpress Yüklü Ürün Listesini Döndürür
      Route::get('/statu', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Ürün Doğrudan yükleme yerine yüklü mü kontrol edilir. Yüklü ise Update edilir.
      Route::get('/delete', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']); //Wordpress Yüklü Ürünü Siler
    });
    Route::prefix('/shipping-zones')->group(function (){
      Route::get('/index', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Wordpress Yüklü Ürün Listesini Döndürür
      Route::get('/statu', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Ürün Doğrudan yükleme yerine yüklü mü kontrol edilir. Yüklü ise Update edilir.
      Route::get('/delete', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']); //Wordpress Yüklü Ürünü Siler
    });
    Route::prefix('/system-status')->group(function (){
      Route::get('/index', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Wordpress Yüklü Ürün Listesini Döndürür
      Route::get('/statu', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Ürün Doğrudan yükleme yerine yüklü mü kontrol edilir. Yüklü ise Update edilir.
      Route::get('/delete', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']); //Wordpress Yüklü Ürünü Siler
    });
    Route::prefix('/tax-classes')->group(function (){
      Route::get('/index', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Wordpress Yüklü Ürün Listesini Döndürür
      Route::get('/statu', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Ürün Doğrudan yükleme yerine yüklü mü kontrol edilir. Yüklü ise Update edilir.
      Route::get('/delete', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']); //Wordpress Yüklü Ürünü Siler
    });
    Route::prefix('/tax-rates')->group(function (){
      Route::get('/index', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Wordpress Yüklü Ürün Listesini Döndürür
      Route::get('/statu', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']);  //Ürün Doğrudan yükleme yerine yüklü mü kontrol edilir. Yüklü ise Update edilir.
      Route::get('/delete', [Scngnr\Pazaryeri\Wordpress\Controller\ProductController::class, '']); //Wordpress Yüklü Ürünü Siler
    });
  });
  Route::prefix('/trendyol')->group(function (){
    Route::prefix('/claim')->group(function(){

    });
    Route::prefix('/CommonLabel')->group(function(){

    });
    Route::prefix('/CurrentAccount')->group(function(){

    });
    Route::prefix('/CustomerAnswer')->group(function(){

    });
    Route::prefix('/Orders')->group(function(){

    });
    Route::prefix('/claproductim')->group(function(){

    });
    Route::prefix('/category')->group(function(){

    });
    Route::prefix('/marka')->group(function(){

    });
  });
  Route::prefix('/n11')->group(function (){
    Route::prefix('/CatalogService')->group(function(){

    });
    Route::prefix('/categoryService')->group(function(){

    });
    Route::prefix('/CityService')->group(function(){

    });
    Route::prefix('/ClaimExchangeService')->group(function(){

    });
    Route::prefix('/InvoiceService')->group(function(){

    });
    Route::prefix('/OrderService')->group(function(){

    });
    Route::prefix('/ProductSellingService')->group(function(){

    });
    Route::prefix('/ProductService')->group(function(){

    });
    Route::prefix('/ProductStockService')->group(function(){

    });
    Route::prefix('/ReturnService')->group(function(){

    });
    Route::prefix('/SapBankStatementEInvoiceService')->group(function(){

    });
    Route::prefix('/SapCommissionEInvoiceDetailService')->group(function(){

    });
    Route::prefix('/SettlementService')->group(function(){

    });
    Route::prefix('/ShipmentCompanyService')->group(function(){

    });
    Route::prefix('/ShipmentService')->group(function(){

    });
    Route::prefix('/TicketService')->group(function(){

    });
  });
  Route::prefix('/hepsiburada')->group(function (){
    Route::prefix('/claim')->group(function(){

    });
    Route::prefix('/catalog')->group(function(){

    });
    Route::prefix('/listinglisting')->group(function(){

    });
    Route::prefix('/order')->group(function(){

    });
    Route::prefix('/transaction')->group(function(){

    });
  });
});
