<?php

namespace App\Http\Controllers\Pazaryeri\Hepsiburada;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Urunler;
use GuzzleHttp\Client;

class ProductController extends Controller
{
    public function productCheck(){
      ini_set('max_execution_time', '0');
      /////////////////////////////////////////////////////////////////////////
      //
      //  Products Kontrol
      //
      ////////////////////////////////////////////////////////////////////////


      //credentials Hepsiburada nın bize sağladığı auth bilgilerimizin base encode ile şifrelenmiş halidir.
      $credentials = base64_encode('canticarett_dev:Ct_12345!');
      //HepsiBurada satıcı ID miz
      $merchantid  = '171a95de-9151-44e7-aaf1-fff423152e38';
      //Auth bilgilerimzi ile istemci modeli oluştur.
      $client = new Client();
      //$response = $client->get("https://listing-external.hepsiburada.com/listings/merchantid/$merchantid?offset=0&limit=2000");
      $response = $client->request('GET', "https://listing-external.hepsiburada.com/listings/merchantid/$merchantid?offset=0&limit=2000", [
          'headers' => [
              'Content-Type'    => 'application/json',
              'Authorization'   => 'Basic ' . $credentials,
          ],
            ]);
      $body = json_decode($response->getBody()->getContents(),true);
      //dd($body);



      for ($i=0; $i < count($body['listings']); $i++) {

        $arraySku = explode('HB', $body['listings'][$i]['merchantSku']);
        $merchantSku = $arraySku[1];

        //Where metodu ile barcode sütününda veri arıyoruz, yok ise birde orWhere metodu ile stokCode sütünunda arıyoruz
        $databaseUrunSorgu = Urunler::where('barcode', $merchantSku)->orWhere('stokCode', $merchantSku)->first();
        //Aradığımız veri veritabanında var ise if komutu ile kayıtları güncelle
        if($databaseUrunSorgu){

          //Eşlesen id ile veritabanı kaydını alıyoruz
          $databaseProduct = Urunler::find($databaseUrunSorgu->id);
          //pazaryeriBatchId bilgilerini arraya çeviriyoruz.
          $pazaryeriBatchId                                     = json_decode($databaseProduct->pazaryeriBatchId , true);
          //merchantSku bilgisini batchId içerisine ekle
          $pazaryeriBatchId['hepsiburada']['merchantSku']           = $body['listings'][$i]['merchantSku'];
          $pazaryeriBatchId['hepsiburada']['hepsiburadaSku']        = $body['listings'][$i]['hepsiburadaSku'];
          $pazaryeriBatchId['hepsiburada']['listingId']             = $body['listings'][$i]['listingId'];
          $pazaryeriBatchId['hepsiburada']['commissionRate']        = $body['listings'][$i]['commissionRate'];
          $pazaryeriBatchId['hepsiburada']['isSalable']            = $body['listings'][$i]['isSalable'];
          $pazaryeriBatchId['hepsiburada']['dispatchTime ']         = $body['listings'][$i]['dispatchTime'];
          $pazaryeriBatchId['hepsiburada']['shippingAddressLabel']  = $body['listings'][$i]['shippingAddressLabel'];
          $pazaryeriBatchId['hepsiburada']['claimAddressLabel']     = $body['listings'][$i]['claimAddressLabel'];
          // Yeni batchId yi json olarak ekle
          $databaseProduct->pazaryeriBatchId                    = json_encode($pazaryeriBatchId);
          //ilgili veritabanın güncelle
          $databaseProduct->update();
          //dd($databaseUrunSorgu);
        }
      }
    }


    public function eslesenUrunGuncelle(){

      ini_set('max_execution_time', '0');

      function convert($data){
        if(strpos($data,".")){
          $chng = str_replace(".", "," , $data);
          $data = $chng;
        }
          return $data;
      }

      /*
      *
      *  Ürün güncelle
      *
      */
      //credentials Hepsiburada nın bize sağladığı auth bilgilerimizin base encode ile şifrelenmiş halidir.
      $credentials = base64_encode('canticarett_dev:Ct_12345!');
      //HepsiBurada satıcı ID miz
      $merchantid  = '171a95de-9151-44e7-aaf1-fff423152e38';
      //Auth bilgilerimzi ile istemci modeli oluştur.
      $client = new Client();
      //$response = $client->get("https://listing-external.hepsiburada.com/listings/merchantid/$merchantid?offset=0&limit=2000");
       $urunler = Urunler::all();

       for ($i=0; $i < count($urunler); $i++) {

         $batchId = json_decode($urunler[$i]->pazaryeriBatchId, true);
         if($batchId){

           $urunler[$i]->fiyati = convert($urunler[$i]->fiyati);
           if(array_key_exists('merchantSku', $batchId['hepsiburada'])){
             //dd($batchId);
             $xml = "<?xml version=\"1.0\" encoding=\"utf-8\"?>
              <listings xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\" xmlns:xsd=\"http://www.w3.org/2001/XMLSchema\">
                <listing>
                  <HepsiburadaSku>{$batchId['hepsiburada']['hepsiburadaSku']}</HepsiburadaSku>
                  <MerchantSku>{$batchId['hepsiburada']['merchantSku']}</MerchantSku>
                  <Price>{$urunler[$i]->fiyati}</Price>
                  <AvailableStock>{$urunler[$i]->stok}</AvailableStock>
                  <DispatchTime>3</DispatchTime>

                  <CargoCompany1>MNG Kargo</CargoCompany1>
                  </listing>
              </listings>";

            $response = $client->request('POST', "https://listing-external.hepsiburada.com/listings/merchantid/$merchantid/inventory-uploads", [
                'headers' => [
                    'Content-Type'    => 'application/xml',
                    'Authorization'   => 'Basic ' . $credentials,
                ],
                'body' => $xml
                  ]);
            $body = json_decode($response->getBody()->getContents(),true);
            sleep(1.5);
            //dd($body);
           }
         }
       }
    }
}
