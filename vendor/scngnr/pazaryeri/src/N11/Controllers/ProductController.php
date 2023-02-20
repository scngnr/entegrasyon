<?php

namespace Scngnr\Pazaryeri\N11\Controllers;

use App\Http\Controllers\Controller;
use IS\PazarYeri\N11\N11Client;
use Illuminate\Http\Request;
use Scngnr\Product\Product;
use Carbon\Carbon;

class ProductController extends Controller
{

  /**
  *
  *
  *
  *
  *
  *
  */

    public function create(){

      $client = new N11Client();
      $client->setApiKey('159dec2a-4b09-46df-8287-c3fa228904a0');
      $client->setApiPassword('TncaxGtCdMm6ypRm');


      $productClass = new  Product;
      $product = $productClass->product->find(71);
      // dd($client->product->getProductByProductId(498516635));
      // dd($product->name);
      $res = $client->product->SaveProduct(
        	array(
						'productSellerCode' => $product->stockCode,
						'title' => $product->name,
						'subtitle' => "1 LT Isı Yalıtımlı Çay Ve Soğuk Su Termosu Soft Pembe",
						'description' => $product->description,
            'attributes' => array(
              'attribute' => array(
                      'name' => 'marka',
                      'value' => 'ews',
                    )
            ),
            'category' => array(
							'id' => 1001321,
						),
            'price' => $product->price,
            'currencyType' => 'TL',
            'images' => [
              'image' => []
            ],
            'saleStartDate' => '',
						'saleEndDate' => '',
						'productionDate' => '',
						'expirationDate' => '',
						'productCondition' => 1,
						'preparingDay' => 2,
						'discount' => array(
							'startDate' => '',
							'endDate' => '',
							'type' => '',
							'value' => '',
						),
            'shipmentTemplate' => "Ews",
						'stockItems' => array(
							'stockItem' => array(
                'attributes' => array(
                  'attribute' => array(
                  )
                ),
									'bundle' => false,
									'mpn' => $product->barcode,
									'gtin' => $product->barcode,
									'oem' => '',
									'quantity' => 0,
									'n11CatalogId' => null,
									'sellerStockCode' => $product->stockCode,
									'optionPrice' => $product->price,
                  'images' => [
                    'image' => array(
                        'url' => $product->pictures,
                        'order' => '1'
                    )
                  ],
								)
							),
						'domestic' => false,
						'specialProductInfoList' => array(
							'specialProductInfo' => array()
						),
						'approvalStatus' => 1,
            'groupAttribute' => '',
            'groupItemCode' => '',
            'itemName' => '',
            'unitInfo' => '',
            'maxPurchaseQuantity' => 1,
            'sellerNote' => $product->name,
						)
				);

        dd($res);
    }

}
