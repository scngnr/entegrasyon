<?php

namespace Scngnr\Pazaryeri\Wordpress\Services;

use Scngnr\Pazaryeri\Wordpress\exception;
use Scngnr\Pazaryeri\Wordpress\Helper\Request;

Class Claim extends Request{

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

    public function create($name, $price, $desc, $shDesc, $stock, $manageStock = TRUE, $category = array(), $images = array())
    {
      $data = [
          'name' => $name,
          'type' => 'simple',
          'regular_price' => $price,
          'description' => $dsc,
          'short_description' => $shDesc,
          'stock_quantity' => $stock,
          'manage_stock' => $manageStock,
          'categories' => $category,
          'images' => $images,
      ];

      $this->getResponse();
      //Wordpress Request Methoduna İstek atılarak Ürün oluşturulması sağlanacak
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
      $data = [
          'regular_price' => '24.54'
      ];

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
