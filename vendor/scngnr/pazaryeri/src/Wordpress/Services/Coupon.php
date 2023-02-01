<?php

namespace Scngnr\Pazaryeri\Wordpress\Services;

use Scngnr\Pazaryeri\Wordpress\Helper\{Exception , Request};

Class Coupon {

      /**
      *
      *
      *
      *  @version Master -- BetaTest
      *  @author Sercan güngör
      */

    public function index()
    {
      $woocommerce->get('coupons');
    }

    /**
    *
    *
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function retrieve()
    {
       print_r($woocommerce->get('coupons/719'));
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
        'code' => '10off',
        'discount_type' => 'percent',
        'amount' => '10',
        'individual_use' => true,
        'exclude_sale_items' => true,
        'minimum_amount' => '100.00'
      ];

      print_r($woocommerce->post('coupons', $data));
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
        'amount' => '5'
      ];

      print_r($woocommerce->put('coupons/719', $data));
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
    php print_r($woocommerce->delete('coupons/719', ['force' => true]));
    }

    /**
    *
    *
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function batch()
    {
      $data = [
          'create' => [
              [
                  'code' => '20off',
                  'discount_type' => 'percent',
                  'amount' => '20',
                  'individual_use' => true,
                  'exclude_sale_items' => true,
                  'minimum_amount' => '100.00'
              ],
              [
                  'code' => '30off',
                  'discount_type' => 'percent',
                  'amount' => '30',
                  'individual_use' => true,
                  'exclude_sale_items' => true,
                  'minimum_amount' => '100.00'
              ]
          ],
          'update' => [
              [
                  'id' => 719,
                  'minimum_amount' => '50.00'
              ]
          ],
          'delete' => [
              720
          ]
      ];

      print_r($woocommerce->post('coupons/batch', $data));    }
}
