<?php


use Illuminate\Support\Facades\Route;
use Automattic\WooCommerce\Client;

Route::get('/wwws', function () {

  $woocommerce = new Client(
    'https://cangungor.com/',
    'ck_f5154a1d577a0f10f1aed00860264c8e1411e1b8',
    'cs_bb02fb3597edbaa14ccc15bf62fc5fbf0bc63edb',
    [
      'version' => 'wc/v3',
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

print_r($woocommerce->post('product', $data));
});

Route::get('test', [Scngnr\Mdent\Eticaret\Woocommerce\Http\Controllers\ProductController::class, 'create'] );
