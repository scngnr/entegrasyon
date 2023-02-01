<?php

namespace Scngnr\Pazaryeri\Wordpress\Services;

use Scngnr\Pazaryeri\Wordpress\Helper\exception;
use Scngnr\Pazaryeri\Wordpress\Helper\Request;
use Scngnr\Pazaryeri\Wordpress\Models\paz_woocommerce_categories as woocommerce_category;
use Scngnr\Product\Product;

Class Productcategories extends Request{

    public $apiUrl = "products/categories";

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
    *
    *
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */


    /**
    *
    *
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function retrieve()
    {
       print_r($woocommerce->get('customers/25'));
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

    public function likeSearch($magzaId, $catId)
    {
      return woocommerce_category::where('catId',  $catId)
                                ->Where('magzaId',  $magzaId)
                                ->first();

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

    public function likeParentCatSearch($catId)
    {
      return woocommerce_category::where('catId',  $catId)
                                ->Where('magzaId',  $magzaId)
                                ->first();

    }

    /**
    *
    *
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function create($name, $magzaId, $catId, $parentCategory)
    {

      $data = [
          'name' => $name,
          'parent' => $parentCategory,
          'image' => [
              'src' => 'http://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2013/06/T_2_front.jpg'
          ]
        ];

        //Product Servisini çağır
        $mVI = new Product;
        //Product Servis den Mağaza Bilgilerini al
        $mVI = $mVI->magza->find($magzaId);
        //Ürün Bilgilerini Request->getresponse  methodu ile Woocommerce ilet
        $response = $this->getResponse($mVI->magazaLink, $mVI->appKey, $mVI->secretKey, 'POST', $this->apiUrl , $data);
        //response bilgilerini Controllee Gönder

        $category = new woocommerce_category;
        $category->	pazaryeriCatId = $response->id;
        $category->magzaId = $magzaId;
        $category->catId = $catId;
        $category->save();

        return $response;
    }

    /**
    *
    *
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function update($pazaryeriCatId, $magzaId, $name, $parentCategory)
    {
      $data = [
          'name' => $name,
          'parent' => $parentCategory,
          'image' => [
              'src' => 'http://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2013/06/T_2_front.jpg'
          ]
        ];

        //Product Servisini çağır
        $mVI = new Product;
        //Product Servis den Mağaza Bilgilerini al
        $mVI = $mVI->magza->find($magzaId);
        //Ürün Bilgilerini Request->getresponse  methodu ile Woocommerce ilet
        $response = $this->getResponse($mVI->magazaLink, $mVI->appKey, $mVI->secretKey, 'PUT', $this->apiUrl. '/' .$pazaryeriCatId , $data);
        //response bilgilerini Controllee Gönder
        return $response;
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
