<?php

namespace Scngnr\XmlService\Http\Controllers;

use Scngnr\Xmlservice\Models\XmlService;
use Scngnr\Xmlservice\Models\en_category_info as Cat;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use IS\PazarYeri\N11\N11Client;
use Scngnr\XmlService\Events;
use Illuminate\Http\Request;

use App\Models\Pazaryeri;
use App\Models\Urunler;
use App\Models\Order;
use Carbon\Carbon;

use Scngnr\Product\Models\en_product;
use Scngnr\Product\Product;
use Scngnr\Xmlservice\Models\XmlKategori;

class XmlAddProduct extends Controller
{
  /**
  *
  *****************************************************************************
  *                          Xml Service
  * 1. databaseXmlKayit metodu Yeni xml eklemek için kullanılacaktır.
  * 2.  Veritabanından ilgili xml bilgileri alınır.
  * 3.  Xml içerisinde ürünler veritabanındaki bilgiler ile taranır.
  * 4.  Ürünler @param Product-Sınıfı Kullanılarak Veritabanına kayıt edilir.
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
            $product->productSaves($databaseUrun['stockCode'],$databaseUrun,$xmlService->xmlAdi);
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
    $xmlKategoris = new \Scngnr\XmlService\Http\Controllers\XmlKategoriBul();
    $xmlKategorileBul->xmlKategorileBul();

    return redirect()->back();
  }
}
