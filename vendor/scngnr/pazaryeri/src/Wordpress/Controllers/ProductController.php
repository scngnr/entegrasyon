<?php

namespace Scngnr\Pazaryeri\Wordpress\Controllers;

use Automattic\WooCommerce\Client;
use Illuminate\Routing\Controller;
use Scngnr\Pazaryeri\Wordpress\Service;
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
      $wordpress = new Service;                                                   //  Wordpress Sınıfımız
       $product = new Product;                                                  //  Product Sınıfımız
       //uvKon Ürün veritabanında kayıt lı mı?
       $uVKON = $product->pazaryeriMatchInfo->find($productId);
       if($uVKON){
         $wordpress->product->update();
       }else {
         $productInfo = $product->product->find($productId);
         $wordpress->product->setApiKey(1);
         $wordpress->product->setApiSecret(2);
         $wpResponse = $wordpress->product->create($productInfo->name, $productInfo->price, $productInfo->description, '', $productInfo->stock, true, array([ 'id' => 9 ]));
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
