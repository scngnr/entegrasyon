<?php

namespace Scngnr\Pazaryeri\Wordpress\Controllers;

use Automattic\WooCommerce\Client;
use Illuminate\Routing\Controller;
use Scngnr\Pazaryeri\Wordpress\Service;
use Scngnr\Product\Product;

class CategoryController extends Controller
{

    /**
    *
    *
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function index()
    {

    }

    /**
    * Ürün Yüklü mü Değil mi
    * Yüklü ise Update methodu çalışacak
    * Değil ise Create methodu çalışacak
    *
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function statu($magzaId, $catId)
    {
      //Wordpress Sınıfını Çağır
      $wordpressClass = new Service;
      //Product Sınıfını çağır
      $productClass = new Product;

      //Product Sınıfı ile $catId Yi Product Kategori Veritabanında Bul
      $dbCategory = $productClass->category->find($catId);
      //magzaID ve catId ile WooCommerce Veritabanı araması yap
      $category = $wordpressClass->Productcategories->likeSearch($magzaId, $catId);

      $parentCategoryId = 0;
      //Eğer PArent Kategori Kontrol et varsa WooCommerce Kategori IDsini Bul ve güncelle
      if ($dbCategory->parentCategory) {
        //İlk Olarak Product Kategorinin Parent Kategorisi varmı Sorgula
        $dbParentCategory = $productClass->category->find($dbCategory->parentCategory);
        //Parent Kategorinin Wordpress Kategori Iddsini Bul
        $findParentcategory = $wordpressClass->Productcategories->likeSearch($magzaId, $dbParentCategory->id);
        //Değişkene Aktar
        $parentCategoryId = $findParentcategory->pazaryeriCatId;
      }

      //kayıtlı ise güncelle
      if ($category) {
        $wordpressClass->Productcategories->update($category->pazaryeriCatId,  $magzaId, $dbCategory->categoryAdi , $parentCategoryId);
      }else {
        //kayıtlı değil ise oluştur
        $categoryResponse = $wordpressClass->Productcategories->create($dbCategory->categoryAdi, $magzaId, $catId , $parentCategoryId);

      }
    }

    /**
    *
    *
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function create()
    {

    }

    /**
    *
    *
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function update()
    {

    }

    /**
    *
    *
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function delete()
    {

    }
}
