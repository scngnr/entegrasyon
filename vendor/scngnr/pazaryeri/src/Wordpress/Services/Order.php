<?php

namespace Scngnr\Pazaryeri\Wordpress\Services;

use Scngnr\Pazaryeri\Wordpress\Helper\{Exception , Request};
use Scngnr\Product\Product;

Class Order extends Request{

      public $apiUrl = "orders";

      /**
      *
      *
      *
      *  @version Master -- BetaTest
      *  @author Sercan güngör
      */

    public function index($magzaId)
    {

      //Product Servisini çağır
      $mVI = new Product;
      //Product Servis den Mağaza Bilgilerini al
      $mVI = $mVI->magza->find($magzaId);
      //Sipariş Bilgilerini Request->getresponse  methodu ile Woocommerce ilet
      $response = $this->getResponse($mVI->magazaLink, $mVI->appKey, $mVI->secretKey, 'GET', $this->apiUrl , array());
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

    /**
    *
    *
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function retrieve()
    {
       print_r($woocommerce->get('orders/727'));
    }

    public function create()
    {
      $data = [
          'payment_method' => 'bacs',
          'payment_method_title' => 'Direct Bank Transfer',
          'set_paid' => true,
          'billing' => [
              'first_name' => 'John',
              'last_name' => 'Doe',
              'address_1' => '969 Market',
              'address_2' => '',
              'city' => 'San Francisco',
              'state' => 'CA',
              'postcode' => '94103',
              'country' => 'US',
              'email' => 'john.doe@example.com',
              'phone' => '(555) 555-5555'
          ],
          'shipping' => [
              'first_name' => 'John',
              'last_name' => 'Doe',
              'address_1' => '969 Market',
              'address_2' => '',
              'city' => 'San Francisco',
              'state' => 'CA',
              'postcode' => '94103',
              'country' => 'US'
          ],
          'line_items' => [
              [
                  'product_id' => 93,
                  'quantity' => 2
              ],
              [
                  'product_id' => 22,
                  'variation_id' => 23,
                  'quantity' => 1
              ]
          ],
          'shipping_lines' => [
              [
                  'method_id' => 'flat_rate',
                  'method_title' => 'Flat Rate',
                  'total' => '10.00'
              ]
          ]
      ];

      print_r($woocommerce->post('orders', $data));
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
          'status' => 'completed'
      ];

      print_r($woocommerce->put('orders/727', $data));
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
      print_r($woocommerce->delete('orders/727', ['force' => true]));
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
                  'payment_method' => 'bacs',
                  'payment_method_title' => 'Direct Bank Transfer',
                  'billing' => [
                      'first_name' => 'John',
                      'last_name' => 'Doe',
                      'address_1' => '969 Market',
                      'address_2' => '',
                      'city' => 'San Francisco',
                      'state' => 'CA',
                      'postcode' => '94103',
                      'country' => 'US',
                      'email' => 'john.doe@example.com',
                      'phone' => '(555) 555-5555'
                  ],
                  'shipping' => [
                      'first_name' => 'John',
                      'last_name' => 'Doe',
                      'address_1' => '969 Market',
                      'address_2' => '',
                      'city' => 'San Francisco',
                      'state' => 'CA',
                      'postcode' => '94103',
                      'country' => 'US'
                  ],
                  'line_items' => [
                      [
                          'product_id' => 79,
                          'quantity' => 1
                      ],
                      [
                          'product_id' => 93,
                          'quantity' => 1
                      ],
                      [
                          'product_id' => 22,
                          'variation_id' => 23,
                          'quantity' => 1
                      ]
                  ],
                  'shipping_lines' => [
                      [
                          'method_id' => 'flat_rate',
                          'method_title' => 'Flat Rate',
                          'total' => '30.00'
                      ]
                  ]
              ],
              [
                  'payment_method' => 'bacs',
                  'payment_method_title' => 'Direct Bank Transfer',
                  'set_paid' => true,
                  'billing' => [
                      'first_name' => 'John',
                      'last_name' => 'Doe',
                      'address_1' => '969 Market',
                      'address_2' => '',
                      'city' => 'San Francisco',
                      'state' => 'CA',
                      'postcode' => '94103',
                      'country' => 'US',
                      'email' => 'john.doe@example.com',
                      'phone' => '(555) 555-5555'
                  ],
                  'shipping' => [
                      'first_name' => 'John',
                      'last_name' => 'Doe',
                      'address_1' => '969 Market',
                      'address_2' => '',
                      'city' => 'San Francisco',
                      'state' => 'CA',
                      'postcode' => '94103',
                      'country' => 'US'
                  ],
                  'line_items' => [
                      [
                          'product_id' => 22,
                          'variation_id' => 23,
                          'quantity' => 1
                      ],
                      [
                          'product_id' => 22,
                          'variation_id' => 24,
                          'quantity' => 1
                      ]
                  ],
                  'shipping_lines' => [
                      [
                          'method_id' => 'flat_rate',
                          'method_title' => 'Flat Rate',
                          'total' => '20.00'
                      ]
                  ]
              ]
          ],
          'update' => [
              [
                  'id' => 727,
                  'shipping_methods' => 'Local Delivery'
              ]
          ],
          'delete' => [
              723
          ]
      ];

      print_r($woocommerce->post('orders/batch', $data));
    }
}
