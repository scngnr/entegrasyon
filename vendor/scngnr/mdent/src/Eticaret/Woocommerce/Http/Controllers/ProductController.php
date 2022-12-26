<?php

namespace Scngnr\Mdent\Eticaret\Woocommerce\Http\Controllers;

use App\Models\Urunler;
use Automattic\WooCommerce\Client;
use Illuminate\Routing\Controller;

class ProductController extends Controller
{

  public function create(){
          ini_set('max_execution_time', '-1');

    $urunler = Urunler::all();

    for ($i=0; $i < count($urunler); $i++) {
      $woocommerce = new Client(
    'https://cangungor.com/',
    'ck_f5154a1d577a0f10f1aed00860264c8e1411e1b8',
    'cs_bb02fb3597edbaa14ccc15bf62fc5fbf0bc63edb',
    [
      'version' => 'wc/v3',
    ]
      );

      $data = [
          'name' => $urunler[$i]->adi,
          'type' => 'simple',
          'regular_price' => $urunler[$i]->fiyati,
          'description' => $urunler[$i]->aciklama,
          'short_description' => $urunler[$i]->aciklma,
          'stock_quantity' => $urunler[$i]->stok,
          'manage_stock' => true,
          "sku" => $urunler[$i]->stokCode,
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

      try{
        print_r($woocommerce->post('products', $data));
      }catch(Exception $e) {
        
      }
    }

  }
}
