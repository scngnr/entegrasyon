<?php

namespace Scngnr\Product\Services;

use Scngnr\Product\Helper\exception;
use Scngnr\Product\Models\pazaryeri_info;

Class Magza {

    /**
    * Kayıtlı Mağzaları Geri döndür
    *
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function index()
    {
      return pazaryeri_info::all();
    }

    /**
    *
    * Veritabanı Like Araması
    *
    *
    *  @param string platform
    *  @param string magazaAdi
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function likeSearch ($searchValue){

      return pazaryeri_info::where('platform', 'LIKE', '%' . $searchValue . '%')
                              ->orWhere('magazaAdi', 'LIKE', '%' . $searchValue . '%')
                              ->get();

    }

  /**
  *
  * Yeni Mağaza Ekle
  *
  *
  *  @param string platform
  *  @param string magazaAdi
  *  @param string magazaLink
  *  @param string appKey
  *  @param string secretKey
  *
  *  @version Master -- BetaTest
  *  @author Sercan güngör
  */

  public function create ($platform, $magazaAdi, $magazaLink, $appKey, $secretKey){
    $magza = new pazaryeri_info;
    $magza->platform    = $platform ;
    $magza->magazaAdi   = $magazaAdi ;
    $magza->magazaLink  = $magazaLink ;
    $magza->appKey      = $appKey ;
    $magza->secretKey   = $secretKey ;
    $magza->save();
  }

  /**
  *
  *  Mağza Bilgilerini Düzenle
  *
  *
  *  @param string platform
  *  @param string magazaAdi
  *  @param string magazaLink
  *  @param string appKey
  *  @param string secretKey
  *
  *  @version Master -- BetaTest
  *  @author Sercan güngör
  */

  public function edit ($magzaId, $platform, $magazaAdi, $magazaLink, $appKey, $secretKey){
    $magza = pazaryeri_info::find($magzaId);
    $magza->platform    = $platform ;
    $magza->magazaAdi   = $magazaAdi ;
    $magza->magazaLink  = $magazaLink ;
    $magza->appKey      = $appKey ;
    $magza->secretKey   = $secretKey ;
    $magza->update();
  }

  /**
  *
  * Kayıtlı Mağazadaki Ürün Fiaytını sil
  *
  *
  *  @param int Mağaza Fiyat Listesi Id
  *
  *  @version Master -- BetaTest
  *  @author Sercan güngör
  */

  public function delete ($magzaId){
    $magzaId = pazaryeri_info::find($magzaId);
    $magzaId->delete();
  }
}
