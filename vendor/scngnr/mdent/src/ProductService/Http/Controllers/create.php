<?php

namespace Scngnr\Mdent\ProductService\Http\Controllers;

use App\Models\Urunler;
use Illuminate\Http\Request;
use Automattic\WooCommerce\Client;
use Illuminate\Routing\Controller;
use Scngnr\Mdent\PriceService\Models\priceService;
use Illuminate\Support\Facades\Http;

class create extends Controller
{

  public function parasutProductCreate(){

    $Urunler = Urunler::all();

    for ($i=0; $i < count($Urunler) ; $i++) {

      $data['id'] = $Urunler[$i]->id;
      $data['type'] = 'products';
      $data['attributes']['id']                         = $Urunler[$i]->id;
      $data['attributes']['code']                       = $Urunler[$i]->stokCode;
      $data['attributes']['name']                       = $Urunler[$i]->adi;
      $data['attributes']['vat_rate']                   = $Urunler[$i]->kdv;
      $data['attributes']['sales_excise_duty']          = $Urunler[$i]->kdv;
      $data['attributes']['sales_excise_duty_type']     = $Urunler[$i]->kdv;
      $data['attributes']['purchase_excise_duty']       = $Urunler[$i]->kdv;
      $data['attributes']['purchase_excise_duty_type']  = $Urunler[$i]->kdv;
      $data['attributes']['unit']                       = "adet";
      $data['attributes']['communications_tax_rate']    = $Urunler[$i]->id;
      $data['attributes']['archived']                   = false;
      $data['attributes']['list_price']                 = $Urunler[$i]->fiyati;
      $data['attributes']['currency']                   = "TRL";
      $data['attributes']['buying_price']               = $Urunler[$i]->fiyati;
      $data['attributes']['buying_currency']            = $Urunler[$i]->fiyati;
      $data['attributes']['inventory_tracking']         = false;
      $data['attributes']['initial_stock_count']        = 5;
      $data['attributes']['gtip']                       = $Urunler[$i]->id;
      $data['attributes']['barcode']                    = $Urunler[$i]->barcode;
      $data['releationship']['id']                      = $Urunler[$i]->id;
      $data['releationship']['type']                    = $Urunler[$i]->id;
      $data['category']['id']                           = 7499902;

      $parasutProductService = new \Scngnr\Mdent\FaturaEnt\Parasut\Http\Controllers\Product();
      $response = $parasutProductService->create($data);

      if(array_key_exists('errors', json_decode($Urunler[$i]->parasut, 1))){
        $updateUrunler = Urunler::find($Urunler[$i]->id);
        $updateUrunler->parasut = json_encode($response);


        if(array_key_exists('errors', $response)){

        }else{
          $updateUrunler->update();
        }
      }
      sleep(3);
    }
  }
}
