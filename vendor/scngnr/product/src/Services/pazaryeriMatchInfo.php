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
    * Veritabanı where - First Araması
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

    public function productMatchSearch ($productId, $magzaId){

      return pazaryeri_product_info::where('productId', 'LIKE', '%' . $productId . '%')
                              ->where('magzaId', 'LIKE', '%' . $magzaId . '%')
                              ->first();

    }

        /**
        *
        * Veritabanı where - First Araması
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

        public function where($pazaryeriProductId){

          return pazaryeri_product_info::where('pazaryeriProductId', $pazaryeriProductId)
                                  ->first();

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

  public function create ($productId, $magzaId, $pazaryeriProductId = "" , $categoryId = "" ,  $categoryAttribue = "" , $otherInfo= "" ){

    $productFiyat = new pazaryeri_product_info;
    $productFiyat->productId            =  $productId;
    $productFiyat->magzaId              =  $magzaId;
    $productFiyat->pazaryeriProductId   =  $pazaryeriProductId;
    $productFiyat->categoryId           =  $categoryId;
    $productFiyat->categoryAttribue     =  $categoryAttribue;
    $productFiyat->otherInfo            =  $otherInfo;
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
