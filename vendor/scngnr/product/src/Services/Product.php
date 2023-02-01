<?php

namespace Scngnr\Product\Services;

use Scngnr\Product\Helper\exception;
use Scngnr\Product\Models\en_product;
use Scngnr\Product\Services\Category;
use Scngnr\Xmlservice\Models\XmlKategori;

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
      * Veritabanı Like Araması
      *
      *
      *  @param bool $paginate --Default False
      *  @param int $paginate   --Value
      *  @version Master -- BetaTest
      *  @author Sercan güngör
      */

    public function likeSearchWithCategory($searcValue, $category, $paginateValue = 25)
    {

      // if($searcValue){
      //   return en_product::where('name', 'LIKE', '%' . $searcValue . '%')
      //                         ->Where('category', $category)
      //                         ->paginate($paginateValue);
      // }else {
      //   return en_product::where('category', $category)
      //                         ->paginate($paginateValue);
      // }

      $findCat = XmlKategori::find($category);
      //Gelen Kategori Bilgisi parent mi kontol et
      if($findCat->parentCategory){
        //Parent Kategori Değil
        //Ürün Arama Değerini kontrol et
        if($searcValue){
          //Nll değil ve veritabanında searchvalue ile like araması yap
          return en_product::where('name', 'LIKE', '%' . $searcValue . '%')
                                ->Where('category', $category)
                                ->paginate($paginateValue);
        }else {
          //searcValue null Sadece kategori Id aramsı yap
          return en_product::where('category', $category)
                                ->paginate($paginateValue);
        }
      }else {
        //Parent Kategori Seçildi
        //Sub Kategorileri Bul
        $subCategory = XmlKategori::where('parentCategory', $findCat->id)->get();
        $categories = array();
        //For ile array sayısınma göre orWhere araması yapılacaktır. 1 kez query builerin olştrulması için eklendi
        $firstCategory = true;
        //SubKategori Sayısını Bul
        for ($i=0; $i < count($subCategory); $i++) {
          //ilk query Builderi oluştur.
          //Sürekli yeniden oluşturulurse ek sorguları dahil edemeyiz.
          if($firstCategory){
            $categories = en_product::orWhere('category', $subCategory[$i]->id);
            $firstCategory = false;
          }
          //Ek sorguları dahil et
          $categories->orWhere('category', $subCategory[$i]->id);
          //query Buildere arama değeri varsa dahil et
          if($searcValue){
            $categories->where('name', 'LIKE', '%' . $searcValue . '%');
          }
        }
        //sorguyu çalıştır ve responsu geri çevir
        return $categories->paginate($paginateValue);
      }
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
