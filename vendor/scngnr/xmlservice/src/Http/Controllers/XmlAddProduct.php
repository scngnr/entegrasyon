<?php

namespace Scngnr\XmlService\Http\Controllers;

use Scngnr\Xmlservice\Models\XmlService;
use Scngnr\Product\Product;
use App\Http\Controllers\Controller;

class XmlAddProduct extends Controller
{

  /**
  *
  *
  *
  *
  *
  */

  public function xmlTarama(){

      $xmlService   = XmlService::all();
      for ($i=0; $i < count($xmlService); $i++) {
        $this->XmlAddProduct($xmlService[$i]->id);
      }
  }


  /**
  *
  *****************************************************************************
  *                          Xml Service
  * 1. databaseXmlKayit metodu Yeni xml eklemek için kullanılacaktır.
  * 2.  Veritabanından ilgili xml bilgileri alınır.
  * 3.  Xml içerisinde ürünler veritabanındaki bilgiler ile taranır.
  * 4.  Ürünler @service Product-Sınıfı Kullanılarak Veritabanına kayıt edilir.
  *
  * @param xmlName
  * @param xmlink
  ******************************************************************************
  */

  public function XmlAddProduct($id){
    $xmlService   = XmlService::find($id);
    ini_set('memory_limit', '3000M');
    ini_set('max_execution_time', '300');
    if($xmlService->xmlDurum == 1 ){
      $xml = simplexml_load_file($xmlService->xmlLinki,'SimpleXMLElement', LIBXML_NOCDATA);
      // $xml = simplexml_load_file($XmlServices->xmlLinki,'SimpleXMLElement', LIBXML_NOCDATA);
      $xml = json_decode(json_encode($xml), true);
      $xmlFirstKey ="";
      //Xml İlk Array Key değerini ve Value $xmlKey değişkenine aktarma
      foreach ($xml as $key => $value) {
        $xmlFirstKey = $key;
        $xmlKey[] = $value;
      }
      if(count($xmlKey) < 2 ){
        $xmlKey =   $xmlKey[0];   //BOş 0 indisini sil
        for ($i=0; $i < count($xmlKey); $i++) {
          $databaseXmlArrayKeyList = json_decode($xmlService->urunBilgileri);                       //Seçili olan xml bilgilerini Veritabanından Al
          $databaseXmlArrayKeyList = json_decode(json_encode($databaseXmlArrayKeyList[1]), true);   //Seçili olan xml bilgilerini Array'a çevir
          $databaseXmlArrayKeyName = array_keys($databaseXmlArrayKeyList);
          //Product Class Ürün İşlemleri için
          $product = new Product;
          $databaseUrun = [];
          for ($j=0; $j < count($databaseXmlArrayKeyList) ; $j++) {
              $arrayKeyName =   $databaseXmlArrayKeyName[$j];
              $arrayKeyValue = $databaseXmlArrayKeyList[$arrayKeyName];
              $urunKontrolValue = $databaseXmlArrayKeyList['stockCode'];
              if($arrayKeyValue == "Ürün Durumu"){
              }else {
                if(array_key_exists($arrayKeyValue, $xml[$xmlFirstKey][$i])) {
                    $databaseUrun[$arrayKeyName] = $xml[$xmlFirstKey][$i][$arrayKeyValue];
                }
              }
            }
            $product->product->product($databaseUrun['stockCode'],$databaseUrun,$xmlService->xmlAdi);
        }
      }else {
        //Xml İkinci Array Key değerini ve Value $xmlKey değişkenine aktarma
        foreach ($xmlKey as $key => $value) {
          $xkey = $key;
          $xmlKey[] = $value;
        }
        $xmlKey =   $xmlKey[$xkey][0];   //BOş 0 indisini sil
          for ($i=0; $i < count($xmlKey); $i++) {
          }
      }
    }

    return redirect()->back();
  }


}
