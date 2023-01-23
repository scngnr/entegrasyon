<?php

namespace Scngnr\Pazaryeri\N11\Controller;

use App\Http\Controllers\Controller;
use IS\PazarYeri\N11\N11Client;
use Illuminate\Http\Request;
use App\Models\Urunler;

class ProductController extends Controller
{
    public function saveProduct(){

      $client = new N11Client();
      $client->setApiKey('801d611a-58df-441a-b146-468d624bf145');
      $client->setApiPassword('QQUm3FV27f0U0JGI');
      $urun = Urunler::find(2);
      $attribute = json_decode($urun->pazaryeriKategoriBilgileri, true);

      //dd($client->product->getProductByProductId(522663140));
      dd(
      $client->product->SaveProduct(
          array(
						'productSellerCode' => $urun->stokCode,
						'title' => $urun->adi,
						'subtitle' => $urun->adi,
						'description' => $urun->aciklama,
            'attributes' => array(
              'attribute' => array(
              )
            ),
            'category' => array(
							'id' => '1001321'
						),
						'price' => $urun->fiyati,
						'currencyType' => '1',
						'images' => array(
							'image' => array(
								array(
									'url' => $urun->resim,
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
									'sellerStockCode' => $urun->stokCode,
									'optionPrice' => $urun->fiyati,
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
				));



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
