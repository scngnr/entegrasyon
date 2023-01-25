<?php

namespace Scngnr\Product\Services;

use Scngnr\Product\Helper\exception;
use Scngnr\Product\Models\en_products_match;

Class matches {


  /**
  * Kayıtlı Mağzalar ile eşleştirilmiş Tüm ürün listenisini döndür
  *
  *
  *  @version Master -- BetaTest
  *  @author Sercan güngör
  */

  public function index()
  {
    return en_products_match::all();
  }

  /**
  * Veritabanı Id ile Mağza Fiyat Araması
  *
  *
  *  @param int mağza Fiayt Id
  *  @return array|null mağza Fiyat
  *
  *  @version Master -- BetaTest
  *  @author Sercan güngör
  */
  public function find($productId){
    return en_products_match::find($productId);
  }

  /**
  *
  * Veritabanı Like Araması
  *
  *
  *  @param string catId            | Ürünün Veritabınımızdaki Kategori ID Si
  *  @param string pazaryeri        | Ürünün Eşleştirildiği Mağaza
  *  @param string pazaryeriCatId   | Ürünün Eşleştirildiği MarketPlace
  *
  *  @version Master -- BetaTest
  *  @author Sercan güngör
  */

  public function likeSearch ($searchValue){

    return en_products_match::where('catId', 'LIKE', '%' . $searchValue . '%')
                            ->orWhere('pazaryeri', 'LIKE', '%' . $searchValue . '%')
                            ->orWhere('pazaryeriCatId', 'LIKE', '%' . $searchValue . '%')
                            ->get();
  }

  /**
  *
  * Kayıtlı Mağazaya Yeni Ürün Fiyatı Ekle
  *
  *
  *  @param string catId            | Ürünün Veritabınımızdaki Kategori ID Si
  *  @param string pazaryeri        | Ürünün Eşleştirildiği Mağaza
  *  @param string pazaryeriCatId   | Ürünün Eşleştirildiği MarketPlace
  *  @param string pazaryeriCatId   | MarketPlace in talep ettiği kategori Özellikleri
  *
  *  @version Master -- BetaTest
  *  @author Sercan güngör
  */

  public function create($productId, $magzaId, $pazaryeriCatId = "", $pazaryeriCatAttrbute = ""){

    $productFiyat = new en_products_match;
    $productFiyat->productId                =  $productId;
    $productFiyat->magzaId                  =  $magzaId;
    $productFiyat->save();
  }

  /**
  *
  * Kayıtlı Mağzaya Ekli Ürünün Fiyatını Düzenle
  *
  *
  *  @param string catId            | Ürünün Veritabınımızdaki Kategori ID Si
  *  @param string pazaryeri        | Ürünün Eşleştirildiği Mağaza
  *  @param string pazaryeriCatId   | Ürünün Eşleştirildiği MarketPlace
  *  @param string pazaryeriCatId   | MarketPlace in talep ettiği kategori Özellikleri
  *
  *
  *  @version Master -- BetaTest
  *  @author Sercan güngör
  */

  public function edit ($productId, $magzaId, $pazaryeriCatId = "", $pazaryeriCatAttrbute = ""){
    $productFiyat = en_products_match::find($pFId);
    $productFiyat->productId                =  $productId;
    $productFiyat->magzaId                  =  $magzaId;
    $productFiyat->update();
  }


  /**
  *
  * Kayıtlı Eşleşmeyi sil
  *
  *
  *  @param string catId            | Ürünün Veritabınımızdaki Kategori ID Si
  *
  *  @version Master -- BetaTest
  *  @author Sercan güngör
  */

  public function delete ($pFId){
    $pFId = en_products_match::find($pFId);
    $pFId->delete();
  }
}
