<?php

namespace Scngnr\Pazaryeri\Wordpress\Services;

use Scngnr\Pazaryeri\Wordpress\Helper\Exception;
use Scngnr\Pazaryeri\Wordpress\Helper\Request;

Class product extends Request{

  public $apikey; 
  public $apiSecret;;
  public $apiUrl = "/product";

        public function setApiKey($key){
          $this->apikey = $key;
        }

        /**
        *
        *
        *   @version Master -- BetaTest
        *   @author Sercan Güngör
        */


        public function setApiSecret($secret){
          $this->apiSecret = $secret;
        }
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

    public function create($name, $price, $desc, $shDesc="", $stock, $manageStock = TRUE, $category = array(), $images = array())
    {

      $data = [
          'name' => $name,
          'type' => 'simple',
          'regular_price' => $price,
          'description' => $desc,
          'short_description' => $shDesc,
          'stock_quantity' => $stock,
          'manage_stock' => $manageStock,
          'categories' => $category,
          'images' => $images,
      ];

      $this->getResponse($this->magzaUrl, $this->apikey, $this->apikSecret, 'POST', $this->apiUrl , $data);
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
