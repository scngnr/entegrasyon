<?php

namespace Scngnr\Pazaryeri\Wordpress\Services;

use Scngnr\Pazaryeri\Wordpress\Helper\{Exception , Request};

Class Order {

      /**
      *
      *
      *
      *  @version Master -- BetaTest
      *  @author Sercan güngör
      */

    public function index()
    {
      print_r($woocommerce->get('customers'));
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
       print_r($woocommerce->get('customers/25'));
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
          'email' => 'john.doe@example.com',
          'first_name' => 'John',
          'last_name' => 'Doe',
          'username' => 'john.doe',
          'billing' => [
              'first_name' => 'John',
              'last_name' => 'Doe',
              'company' => '',
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
              'company' => '',
              'address_1' => '969 Market',
              'address_2' => '',
              'city' => 'San Francisco',
              'state' => 'CA',
              'postcode' => '94103',
              'country' => 'US'
          ]
      ];

      print_r($woocommerce->post('customers', $data));
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
          'first_name' => 'James',
          'billing' => [
              'first_name' => 'James'
          ],
          'shipping' => [
              'first_name' => 'James'
          ]
      ];

      print_r($woocommerce->put('customers/25', $data));
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
      print_r($woocommerce->delete('customers/25', ['force' => true]));
    }

    /**
    *
    *
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function batch ()
    {
      $data = [
            'create' => [
                [
                    'email' => 'john.doe2@example.com',
                    'first_name' => 'John',
                    'last_name' => 'Doe',
                    'username' => 'john.doe2',
                    'billing' => [
                        'first_name' => 'John',
                        'last_name' => 'Doe',
                        'company' => '',
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
                        'company' => '',
                        'address_1' => '969 Market',
                        'address_2' => '',
                        'city' => 'San Francisco',
                        'state' => 'CA',
                        'postcode' => '94103',
                        'country' => 'US'
                    ]
                ],
                [
                    'email' => 'joao.silva2@example.com',
                    'first_name' => 'João',
                    'last_name' => 'Silva',
                    'username' => 'joao.silva2',
                    'billing' => [
                        'first_name' => 'João',
                        'last_name' => 'Silva',
                        'company' => '',
                        'address_1' => 'Av. Brasil, 432',
                        'address_2' => '',
                        'city' => 'Rio de Janeiro',
                        'state' => 'RJ',
                        'postcode' => '12345-000',
                        'country' => 'BR',
                        'email' => 'joao.silva@example.com',
                        'phone' => '(55) 5555-5555'
                    ],
                    'shipping' => [
                        'first_name' => 'João',
                        'last_name' => 'Silva',
                        'company' => '',
                        'address_1' => 'Av. Brasil, 432',
                        'address_2' => '',
                        'city' => 'Rio de Janeiro',
                        'state' => 'RJ',
                        'postcode' => '12345-000',
                        'country' => 'BR'
                    ]
                ]
            ],
            'update' => [
                [
                    'id' => 26,
                    'billing' => [
                        'phone' => '(11) 1111-1111'
                    ]
                ]
            ],
            'delete' => [
                25
            ]
        ];

        print_r($woocommerce->post('customers/batch', $data));
    }
}
