<?php

namespace Scngnr\Pazaryeri\N11\Controllers;

use App\Http\Controllers\Controller;
use IS\PazarYeri\N11\N11Client;
use Illuminate\Http\Request;
use Scngnr\Product\Product;

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
      $product = $productClass->product->find($id);


      $response = $client->product->SaveProduct(
          array(
						'productSellerCode' => $product->stokCode,
						'title' => $product->name,
						'subtitle' => $product->name,
						'description' => $product->description,
            'attributes' => array(
              'attribute' => array(
              )
            ),
            'category' => array(
							'id' => '1001321'
						),
						'price' => $product->price,
						'currencyType' => '1',
						'images' => array(
							'image' => array(
								array(
									'url' => $product->pictures,
									'order' => '1',
								)
							)
						),
            'saleStartDate' => '',
            'saleEndDate' => '',
						'productionDate' => '',
						'productCondition' => 1,
						'preparingDay' => 2,
						'domestic' => 'false',
						'discount' => array(
							'startDate' => '',
							'endDate' => '',
							'type' => '',
							'value' => '',
						),
						'shipmentTemplate' => 'Ews',
            'stockItems' => array(
							'stockItem' => array(
								array(
									'bundle' => 'false',
									'mpn' => '',
									'gtin' => '',
									'oem' => '',
									'quantity' => '0',
									'n11CatalogId' => '',
									'sellerStockCode' => $product->stokCode,
									'optionPrice' => $product->price,
									'attributes' => array(
										'attribute' => array(

										)
									)
								)
							)
						),
						'specialProductInfoList' => array(
							'specialProductInfo' => array(
								'key' => '?',
								'value' => '?',
							)
						),
						'approvalStatus' => '1',
						'expirationDate' => '',

						'unitInfo' => array(
							'unitType' => '',
							'unitWeight' => ''
						),
						'maxPurchaseQuantity' => '122',
						'groupAttribute' => '',
						'groupItemCode' => '',
						'itemName' => ''
					)
				);

        dd($response);
    }

    public function databaseAttributeSave(Request $request){

      $frontEndUrunAndCategoryData = explode('.', $request->input('button'));                       //button içerisine eklediğimiz işaratlenen ürünId ve category id bilgisi
      $frontEndUrunId              = base64_decode(base64_decode($frontEndUrunAndCategoryData[1])); //base64_decode işlemi ile ürün bilgilerini array çeviriyoruz
      $frontEndUrunId              = explode('[', $frontEndUrunId);
      $frontEndUrunId              = explode(']', $frontEndUrunId[1]);
      $frontEndUrunId              = explode(',', $frontEndUrunId[0]);

      $categoryId                  = $frontEndUrunAndCategoryData[0];                               // CategorId button içerisinden alınıyor
      $frontEndFormDataArrayKeys = array_keys($request->input());                                   //döngüde kullanılıcak bilgilerin keyleri alınıyor

      //dd($frontEndFormDataArrayKeys[1]);
      //$databaseUrunPBJson['N11']['categoryId']['categoryAttributes'] = array();
      for ($h=0; $h < count($frontEndUrunId); $h++) {

        $databaseUrun           = Urunler::find($frontEndUrunId[$h]);
        $databaseUrunPBJson     = json_decode($databaseUrun->pazaryeriKategoriBilgileri, true);

        $databaseUrunPBJson['n11']['category']['id'] = $categoryId;

        // for ($i=0; $i <count($frontEndFormDataArrayKeys) ; $i++) {
        //
        //   $keyName = $frontEndFormDataArrayKeys[$i];
        //   if(($keyName != '_token' ) && ($keyName != 'button')){
        //
        //     $databaseUrunPBJson['n11']['attributes']['attribute'][$keyName] = $request->input($keyName);
        //
        //   }
        // }
        $databaseUrun->pazaryeriKategoriBilgileri = json_encode($databaseUrunPBJson);
        $databaseUrun->update();
      }

      //dd($request->input());

      return redirect()->to('product');
    }
}
