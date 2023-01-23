<?php

namespace Scngnr\Product\Services;

use Scngnr\Product\Helper\exception;
use Scngnr\Xmlservice\Models\XmlKategori as Kategori;

Class category {


  /**
  *  Tüm Kategorileri Listele
  *
  *  @param bool $paginate --Default False
  *  @param int $paginate   --Value
  *  @version Master -- BetaTest
  *  @author Sercan güngör
  */

  public function index($paginate = FALSE, $paginateValue = 0)
  {
    if($paginate){
      return Kategori::all()->paginate($paginateValue);
    }else {
      return Kategori::all();
    }
  }

  /**
  * Veritabanı Id ile Mağza Araması
  *
  *
  *  @param int category Id
  *  @return array|null category
  *
  *  @version Master -- BetaTest
  *  @author Sercan güngör
  */
  public function find($productId){
    return Kategori::find($productId);
  }

  /**
  * İletilen Kategori Adında
  * -Eklenmesi
  * - çıkarılması gereken işlemler var ise yapılır.
  * Kategori Veritabanında Kayıtlı mı ?
  * Kontrol edilir
  *
  * --Kayıtlı Değil ise
  * @see create()
  *
  * Kayıtlı ise
  * @see update()
  *
  * @version Master -- BetaTest
  * @author Sercan Güngör
  */

  public function category($categoryName, $spect , $source){

    //Ana kategoriler
      $kategoriler = explode('>', $categoryName);
      $findkategori = Kategori::where('categoryAdi', $kategoriler[0] )->first();
      if($findkategori){


      }else {
        $this->create($kategoriler[0], "", $source);
      }

    //Bir alt Katoriler
      try {
        $kategoriler = explode('>', $categoryName);
        $findkategori = Kategori::where('categoryAdi', $kategoriler[1] )->first();
        if($findkategori){


        }else {
              $findkategori = Kategori::where('categoryAdi', $kategoriler[0] )->first();
              $this->create($kategoriler[1], $findkategori->id, $source);
              if ($kategoriler[1]) {
                $kategori = $kategoriler[1];
              }
        }
      } catch (\Exception $e) {

      }

    //Alt Katoriler
      try {
        $kategoriler = explode('>', $categoryName);
        $findkategori = Kategori::where('categoryAdi', $kategoriler[2] )->first();
        if($findkategori){


        }else {
              $findkategori = Kategori::where('categoryAdi', $kategoriler[1] )->first();
              $this->create($kategoriler[2], $findkategori->id, $source);
              if ($kategoriler[2]) {
                $kategori = $kategoriler[2];
              }
        }
      } catch (\Exception $e) {

      }
      $kategori = count($kategoriler);
      $kategori = $kategoriler[$kategori-1];
      $findkategori = Kategori::where('categoryAdi', $kategori )->first();
      return $findkategori->id;
  }

  /**
  * Yeni Kategori Oluştur
  *
  * @param string categoryName
  * @param string categoryParent
  *
  * @version Master -- BetaTest
  * @author Sercan Güngör
  */

  public function create($categoryName, $categoryParent, $source){
    $addCat = new Kategori;
    $addCat->parentCategory = $categoryParent;
    $addCat->categoryAdi = $categoryName;
    $addCat->kaynak =  $source;
    $addCat->save();
  }

  /**
  * Kategori Güncelle
  *
  * @param string categoryName
  * @param string categoryParent
  *
  * @version Master -- BetaTest
  * @author Sercan Güngör
  */

  public function update($productId, $categoryName, $categoryParent){

  }

  /**
  * Varyasyonu bulunan Tüm Ürünleri Listele
  *
  * @param int kategoriId
  *
  * @version Master -- BetaTest
  * @author Sercan Güngör
  */

  public function delete($kategoriId){

  }
}
