<?php

namespace Scngnr\Mdent\ProductService\Http\Controllers;

use App\Models\Urunler;
use Illuminate\Http\Request;
use Automattic\WooCommerce\Client;
use Illuminate\Routing\Controller;
use Scngnr\Mdent\PriceService\Models\priceService;
use Illuminate\Support\Facades\Http;

class delete extends Controller
{

  public function allDelete(){


    $controller = new \Scngnr\Mdent\FaturaEnt\Parasut\Http\Controllers\Product();
    $Urunler = $controller->index();

    for ($i=0; $i < 50; $i++) {

          $Urunler = $controller->index();
          //dd($Urunler['data']);
      for ($j=0; $j < 15; $j++) {
          $controller->delete($Urunler['data'][$j]['id']);
          sleep(3);
      }
    }
  }
}
