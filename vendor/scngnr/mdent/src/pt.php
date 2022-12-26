<?php

namespace Scngnr\Mdent;

use App\Models\Urunler;
use Automattic\WooCommerce\Client;
use Illuminate\Routing\Controller;

class pt extends Controller
{

  public function create(){

    $urunler = Urunler::all();

    $woocommerce = new Client(
      'http://wordpress-env.eba-z2tkbkcq.eu-central-1.elasticbeanstalk.com/',
      'ck_8845189fa37620eb31d793957efca3e61cbfb07f',
      'cs_c3078472b165c8a02a4f8d72860b1778ff794fc5',
      // 'http://scngnrtest.infinityfreeapp.com/',
      // 'ck_8d5be61d54545732b941cd3c33925f97a9ca0f07',
      // 'cs_4d827c3baaf7ecfc28ac949e0903dcae39a3bec6',
      //   'http://localhost/projeler/wp',
      // 'ck_da24c9f275939efd1ee903d5a0182a2f3e9c2e6f',
      // 'cs_26d02f3a3837854df48f5575be241300d6bc18f9',
      [
       'wp_api' => true,
       'version' => 'wc/v3',
       'query_string_auth' => true
   ]
        );
        $data = [
    'name' => 'Premium Quality',
    'type' => 'simple',
    'regular_price' => '21.99',
    'description' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.',
    'short_description' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.',
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
            'src' => 'http://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2013/06/T_2_front.jpg'
        ],
        [
            'src' => 'http://demo.woothemes.com/woocommerce/wp-content/uploads/sites/56/2013/06/T_2_back.jpg'
        ]
    ]
];

print_r($woocommerce->post('products', $data));
  }
}
