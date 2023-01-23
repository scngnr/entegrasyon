<?php

namespace Scngnr\Pazaryeri\Wordpress\Services;

use Scngnr\Pazaryeri\Wordpress\exception;

Class Claim {

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

    public function create()
    {
      $data = [
          'name' => $urunler[$i]->adi,
          'type' => 'simple',
          'regular_price' => $urunler[$i]->fiyati,
          'description' => $urunler[$i]->aciklama,
          'short_description' => $urunler[$i]->aciklma,
          'stock_quantity' => $urunler[$i]->stok,
          'manage_stock' => true,
          'categories' => [
              [
                  'id' => 9
              ],
              [
                  'id' => 14
              ]
          ],
          'images' => [
              [
                  'src' => $urunler[$i]->resim
              ]
          ]
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
