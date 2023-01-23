<?php

namespace Scngnr\Product\Services;

use Scngnr\Product\Helper\exception;
use Scngnr\Product\Models\en_product;
use Scngnr\Product\Services\Category;

Class Product {

      /**
      * Veritabanındaki Tüm Ürünleri Getir
      *
      *
      *  @param bool $paginate --Default False
      *  @param int $paginate   --Value
      *  @version Master -- BetaTest
      *  @author Sercan güngör
      */

    public function index($paginate = FALSE, $paginateValue = 10)
    {
      if($paginate){
        return en_product::paginate($paginateValue);
      }else {
        return en_product::all();
      }
    }

    /**
    * Veritabanı Id ile Product Araması
    *
    *
    *  @param int productId
    *  @return array|null product
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */
    public function find($productId){
      return en_product::find($productId);
    }

    /**
    * Veritabanı Like Araması
    *
    *
    *  @param bool $paginate --Default False
    *  @param int $paginate   --Value
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

  public function likeSearch($searcValue, $paginateValue = 10)
  {
    return en_product::where('name', 'LIKE', '%' . $searcValue . '%')
                          ->orWhere('price', 'LIKE', '%' . $searcValue . '%')
                          ->orWhere('stockCode', 'LIKE', '%' . $searcValue . '%')
                          ->orWhere('source', 'LIKE', '%' . $searcValue . '%')
                          ->orWhere('gtin', 'LIKE', '%' . $searcValue . '%')
                          ->paginate($paginateValue);
  }


    /**
    *
    * Yeni Ürün ekledem önce veritabanında aynı Stok koduna sahip
    *   var mı kontrol et
    *
    *  --Ürün Kayıtlı değil ise
    *  @see create()
    *
    *  -- Kayıtlı ise
    *  @see update()
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function product($stokCode , $spect, $source){
      $kontrol = en_product::where('stockCode', $stokCode)->first();
      $category = new Category;
      $categoryResponse = $category->category($spect['category'], $spect['name'], $source);
      $spect['category'] = $categoryResponse;
      if($kontrol){
        $this->update($kontrol->id , $spect);
      }else {
        $this->create($spect, $source);
      }
    }


    /**
    * Veritabanına Yeni Ürün Ekle
    * @param bool   Status             Ürün Durumu
    * @param string name               Ürün Adı (*)
    * @param int    price              Ürün fiyatı (*)
    * @param int    regularPrice       Üstü Çizili Fiyat
    * @param int    category           Ürün Kategorisi
    * @param int    tax                Ürün vergi Dilimi
    * @param string currency           Ürün parama birimi
    * @param string description        Ürün Açıklaması
    * @param string stockCode          Ürün Stok Kodu
    * @param int    gtin               Ürün Ulusan barkod Numarası
    * @param string pictures (1 - 5 )  Ürün Resim Alanları
    * @param int    deci               Ürün Kargo desi değeri
    * @param int    stock              Ürün Stok Adeti
    * @param bool   varyation          Ürün Varyasyonu Var mı
    * @param string source             Ürün Kaynağı ( Xml - Exel - Manuel vs.)
    * @param
    * @version Master -- BetaTest
    * @author Sercan güngör
    */

    public function create($spect, $source)
    {
      $product = new en_product;
      $product['source'] = $source;
      $spectKeylist = array_keys($spect);
      for ($i=0; $i < count($spectKeylist) ; $i++) {
        $spectKeyName = $spectKeylist[$i];
        if($spect[$spectKeyName]){
          $product[$spectKeyName] = $spect[$spectKeyName];
        }
      }
      $product->save();
    }

    /**
    * Veritabanındaki Ürünü Güncelle
    * Güncellenebilecek Parametlere Yeni Ürün Ekle Açıklamasından Bakılabilir
    *
    *
    *  @param int Product Id
    *  @param array Product Values
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function update($productId , $spect)
    {
      $product =  en_product::find($productId);
      // $product[$spect] = $deger;
      $spectKeylist = array_keys($spect);
      for ($i=0; $i < count($spectKeylist) ; $i++) {
        $spectKeyName = $spectKeylist[$i];
        //if(array_key_exists($spectKeyName, $spect)){
        if($spect[$spectKeyName]){
            $product[$spectKeyName] = $spect[$spectKeyName];
        }
      }
      $product->update();
    }
    /**
    * Kayıtlı Ürünün Durumunu Güncelle
    *
    *
    *   @param int Product Id
    *   @param int Status değeri
    *       -- 0 Pasif (Satışta Değil)
    *       -- 1 Taslak
    *       -- 2 Stok Yok
    *       -- 3 Aktif (Satışta)
    *
    *   @version Master -- BetaTest
    *   @author Sercan güngör
    */

    public function status($productId, $status)
    {
      $spect['status'] = $status;
      $this->update($productId, $spect);
    }

    /**
    * Veritabanındaki Ürünü Sil
    *
    *
    *   @param int Product Id
    *   @version Master -- BetaTest
    *   @author Sercan güngör
    */

    public function delete($productId)
    {
      $product =  en_product::find($productId);
      $product->delete();
    }
}
