<?php

namespace Scngnr\Pazaryeri\Wordpress\Controllers;

use Automattic\WooCommerce\Client;
use Illuminate\Routing\Controller;
use Scngnr\Pazaryeri\Wordpress\Service;
use Scngnr\Pazaryeri\Wordpress\Helper\Exception;
use Scngnr\Product\Product;

class ProductController extends Controller
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
    * Ara kontrol
    * Yüklü ise Update methodu çalışacak
    * Değil ise Create methodu çalışacak
    *
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function statu($magzaId, $productId)
    {
      //  Wordpress Sınıfımız
      $wordpress = new Service;
      //  Product Sınıfımız
       $product = new Product;
       //uvKon Ürün veritabanında kayıt lı mı?
       $uVKON = $product->pazaryeriMatchInfo->productMatchSearch($productId, $magzaId);
       //Product Sınıfı Product Servisinden Ürün Bilgilerini al
        $productInfo = $product->product->find($productId);

        //Ürün kategorisinin WooCommerce veritabanındaki Id sini bul
        $findWoocomerceCatId = $wordpress->Productcategories->likeSearch($magzaId, $productInfo->category);

        $images =array();
        if($productInfo->pictures){
          array_push($images, array('src' => $productInfo->pictures));
        }
        elseif($productInfo->pictures2){
          array_push($images, array('src' =>$productInfo->pictures2));
        }elseif($productInfo->pictures3){
          array_push($images, array('src' =>$productInfo->pictures3));
        }elseif($productInfo->pictures4){
          array_push($images, array('src' =>$productInfo->pictures4));
        }if($productInfo->pictures5){
          array_push($images, array('src' =>$productInfo->pictures5));
        }
       //Kayıtlı
       if($uVKON){
         $wordpress->product->update($magzaId, $uVKON->pazaryeriProductId, $productInfo->price,
                                     $findWoocomerceCatId->pazaryeriCatId,
                                     $images);
         //Kayıtlı Değill
       }else {

         //Wordpress Sınıfını kullanarak Ürün oluşturulması
         $wpResponse = $wordpress->product
                            ->create($magzaId, $productInfo->name, $productInfo->price,
                                      $productInfo->description, '', $productInfo->stock,
                                      $productInfo->stockCode, true, $findWoocomerceCatId->pazaryeriCatId,
                                      $images);
         //Wordpress Sınııfndan  Dönen response bilgilerini PAzaryeri ile eşleştirilen ürün veritababnına kayıt et
         $producMatchInfo = $product->pazaryeriMatchInfo->create($productId, $magzaId, $wpResponse->id);
         //Pazaryerine eklenen Ürün İçin Veri Tabanında Kayıtlı Fiyat Yok ise Default Ürün Fiyatı Ekle
         if(! $product->magzaPrice->productMatchSearch($productId)){
           $product->magzaPrice->create($productId, 'woocommerce', $magzaId, 'SF' , '', '');
         }
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
