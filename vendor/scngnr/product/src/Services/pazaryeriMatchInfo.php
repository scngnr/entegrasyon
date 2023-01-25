<?php

namespace Scngnr\Product\Services;

use Scngnr\Product\Helper\exception;
use Scngnr\Product\Models\pazaryeri_product_info;

Class pazaryeriMatchInfo {

    /**
    * Kayıtlı Mağzalar ile eşleştirilmiş Tüm ürün listenisini döndür
    *
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function index()
    {
      return pazaryeri_product_info::all();
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
      return pazaryeri_product_info::find($productId);
    }

    /**
    *
    * Veritabanı Like Araması
    *
    *
    *  @param string productId
    *  @param string pazaryeri
    *  @param string magaza
    *  @param string fiyat
    *  @param string fiyatKaynak
    *  @param string indirimliFiyat
    *  @param string indirimliFiyatBaslangic
    *  @param string indirimliFiyatBitis
    *  @param string status
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function likeSearch ($searchValue){

      return pazaryeri_product_info::where('productId', 'LIKE', '%' . $searchValue . '%')
                              ->orWhere('pazaryeri', 'LIKE', '%' . $searchValue . '%')
                              ->orWhere('magaza', 'LIKE', '%' . $searchValue . '%')
                              ->orWhere('fiyat', 'LIKE', '%' . $searchValue . '%')
                              ->orWhere('pazaryeri', 'LIKE', '%' . $searchValue . '%')
                              ->get();
    }

  /**
  *
  * Kayıtlı Mağazaya Yeni Ürün Fiyatı Ekle
  *
  *
  *  @param string productId
  *  @param string pazaryeri
  *  @param string magaza
  *  @param string fiyat
  *  @param string fiyatKaynak
  *  @param string indirimliFiyat
  *  @param string indirimliFiyatBaslangic
  *  @param string indirimliFiyatBitis
  *  @param string status
  *
  *  @version Master -- BetaTest
  *  @author Sercan güngör
  */

  public function create ($productId, $pazaryeri, $magza , $fiyatKaynak ,  $islem, $formul){

    $productFiyat = new pazaryeri_product_info;
    $productFiyat->productId                =  $productId;
    $productFiyat->pazaryeri                =  $pazaryeri;
    $productFiyat->magaza                   =  $magza;

    //Fiyat Belirleme
    if($fiyatKaynak == 'BF'){
        $product = new \Scngnr\Product\Product;
       $product = $product->product->find($productId);
       switch ($islem) {
         case 'topla': $productFiyat->fiyat = $product->price + $formul; break;
         case 'cikar': $productFiyat->fiyat = $product->price - $formul; break;
         case 'carp':  $productFiyat->fiyat = $product->price  * $formul; break;
         case 'bol':   $productFiyat->fiyat = $product->price  / $formul; break;
       }
    }

    $productFiyat->fiyatKaynak              =  $fiyatKaynak;
    $productFiyat->save();
  }

  /**
  *
  * Kayıtlı Mağzaya Ekli Ürünün Fiyatını Düzenle
  *
  *
  *  @param string productId
  *  @param string pazaryeri
  *  @param string magaza
  *  @param string fiyat
  *  @param string fiyatKaynak
  *  @param string indirimliFiyat
  *  @param string indirimliFiyatBaslangic
  *  @param string indirimliFiyatBitis
  *  @param string status
  *
  *  @version Master -- BetaTest
  *  @author Sercan güngör
  */

  public function edit ($pFId ,$productId, $pazaryeri, $magza , $fiyat , $fiyatKaynak = "", $indirimliFiyat = "", $indirimliFiyatBaslangic = "", $indirimliFiyatBitis = "" ){
    $productFiyat = pazaryeri_product_info::find($pFId);
    $productFiyat->productId                =  $productId;
    $productFiyat->pazaryeri                =  $pazaryeri;
    $productFiyat->magaza                   =  $magza;
    $productFiyat->fiyat                    =  $fiyat;
    $productFiyat->fiyatKaynak              =  $fiyatKaynak;
    $productFiyat->indirimliFiyat           =  $indirimliFiyat;
    $productFiyat->indirimliFiyatBaslangic  =  $indirimliFiyatBaslangic;
    $productFiyat->indirimliFiyatBitis      =  $indirimliFiyatBitis;
    $productFiyat->update();
  }

  /**
  *
  * Kayıtlı Mağzaya Ekli Ürünün Fiyatını Düzenle
  *
  *
  *  @param string pFId -- Pazaryeri Fiyat Id
  *  @param string status
  *
  *  @version Master -- BetaTest
  *  @author Sercan güngör
  */

  public function status ($pFId, $status){
    $pFId = pazaryeri_product_info::find($pFId);
    $pFId->status = $status;
    $pFId->update();
  }

  /**
  *
  * Kayıtlı Mağazadaki Ürün Fiaytını sil
  *
  *
  *  @param string pFId -- Pazaryeri Fiyat Id
  *
  *  @version Master -- BetaTest
  *  @author Sercan güngör
  */

  public function delete ($pFId){
    $pFId = pazaryeri_product_info::find($pFId);
    $pFId->delete();
  }

  /**
  *
  * Mağzaya Kayıtlı Tüm Fiyat listenisini Sil
  *
  *
  *  @param string Pazaryeri -- Adi
  *
  *  @version Master -- BetaTest
  *  @author Sercan güngör
  */

  public function allDelete ($allPFId){
    $allPFId = pazaryeri_product_info::where('pazaryeri', $allPFId)->get();
    for ($i=0; $i < count($allPFId) ; $i++) {
      $pFId = pazaryeri_product_info::find($allPFId[$i]->id);
      $pFId->delete();
    }
  }
}
