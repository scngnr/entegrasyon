<?php

namespace Scngnr\Pazaryeri\Wordpress\Services;

use Scngnr\Pazaryeri\Wordpress\Helper\{Exception , Request};
use Scngnr\Pazaryeri\Wordpress\Service;
use Scngnr\Product\Product as ProductService;

Class product extends Request{

  public $apiUrl = "products";


      /**
      *
      *
      *
      *  @version Master -- BetaTest
      *  @author Sercan güngör
      */

    public function index()
    {
      //$woocommerce->get('products');
    }

    /**
    *
    *
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function create($magzaId, $name, $price, $desc, $shDesc="", $stock, $sku, $manageStock = TRUE, $category = array(), $images = array())
    {
      // Woocomerce Ürün yapısı
      $data = [
          'name' => $name,
          'type' => 'simple',
          'regular_price' =>$price,
          'description' => $desc,
          'short_description' => $shDesc,
          'stock_quantity' => $stock,
          'manage_stock' => $manageStock,
          'categories' => $category,
          'images' => $images,
          'sku'  => $sku,
          // 'status'  => "",
          // 'featured'  => "",
          // 'sale_price'  => "",
          // 'regular_price'  => "",
          // 'on_sale'  => "",
          // 'purchasable'  => "",
          // 'total_sales'  => "",
          // 'virtual'  => false,
          // 'downloadable'  => false,
      ];
      //Product Servisini çağır
      $mVI = new ProductService;
      //Product Servis den Mağaza Bilgilerini al
      $mVI = $mVI->magza->find($magzaId);
      //Ürün Bilgilerini Request->getresponse  methodu ile Woocommerce ilet
      $response = $this->getResponse($mVI->magazaLink, $mVI->appKey, $mVI->secretKey, 'POST', $this->apiUrl , $data);
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

    public function update($magzaId,$pazaryeriProductId)
    {
      $data = [
          'regular_price' => '24.54',
          // 'name' => $name,
          // 'type' => 'simple',
          // 'regular_price' =>$price,
          // 'description' => $desc,
          // 'short_description' => $shDesc,
          // 'stock_quantity' => $stock,
          // 'manage_stock' => $manageStock,
          // 'categories' => $category,
          // 'images' => $images,
          // 'sku'  => $sku,
          // 'status'  => "",
          // 'featured'  => "",
          // 'sale_price'  => "",
          // 'regular_price'  => "",
          // 'on_sale'  => "",
          // 'purchasable'  => "",
          // 'total_sales'  => "",
          // 'virtual'  => false,
          // 'downloadable'  => false,
      ];
      //Product Servisini çağır
      $mVI = new ProductService;
      //Product Servis den Mağaza Bilgilerini al
      $mVI = $mVI->magza->find($magzaId);
      //Ürün Bilgilerini Request->getresponse  methodu ile Woocommerce ilet
      $response = $this->getResponse($mVI->magazaLink, $mVI->appKey, $mVI->secretKey, 'PUT', $this->apiUrl . '/' . $pazaryeriProductId, $data);
      //response bilgilerini Controllee Gönder
      return $response;
      //Wordpress Request Methoduna İstek atılarak Ürün oluşturulması sağlanacak
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
      //$woocommerce->delete('products/794', ['force' => true]);
    }
}
