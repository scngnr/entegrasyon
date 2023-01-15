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

class XmlController extends Controller
{

  /**
  *
  *****************************************************************************
  *                          Xml Service
  * 1. databaseXmlKayit metodu Yeni xml eklemek için kullanılacaktır.
  * 2.  Bu method ile xml veritabınna kayıt edilir.
  * 3.
  * @param xmlName
  * @param xmlink
  ******************************************************************************
  */

  public function xmlAdd(Request $request){

    ini_set('memory_limit', '3000M');
    ini_set('max_execution_time', '300');

    // dd($request->input());
    $XmlServices = new XmlService;

    $XmlServices->xmlAdi         = $request->input('xmlName');
    $XmlServices->xmlLinki       = $request->input('xmlLink');
    $XmlServices->xmlDurum       = 'aktif degil';

    $xml = simplexml_load_file($request->input('xmlLink'));
    $xml = json_decode(json_encode($xml), true);

    $arrayXmlKeyList = array();

    $xmlKeyCount = count($xml);           //xml ilk key sayısı
    $xmlKeyList   = array_keys($xml);     //xml ilk anahterdeğerleri
    // $xmlKeyList   = array_keys($xml['item']);     //xml ilk anahterdeğerleri
    // $xmlKeyList   = array_keys($xml['item'][0]);     //xml ilk anahterdeğerleri


    //print_r($xmlKeyList);
    for ($i=0; $i < $xmlKeyCount; $i++) {
      if(is_array($xml)){
        $xmlKeyName = $xmlKeyList[$i];                   //yeni array alıncak key değeri seçiliyor
        if(array_key_exists($xmlKeyName, $arrayXmlKeyList)){
          echo "ok 1 - ";
        }else {
          if($xml[$xmlKeyName] < 1){
            $arrayXmlKeyList[$xmlKeyName] =  array();

            $xmlKeyCount2 = count($xml[$xmlKeyName]);           // bir alt array sayısı alnıyor
            $xmlKeyList2   = array_keys($xml[$xmlKeyName]);     //bir alt array anahterdeğerleri alnıyor

            $XmlServices->xmlUrunAdet = $xmlKeyCount2 ;          //Xml deki urun Sayısını veritabanına kayıt et
              //print_r($xmlKeyList2[1]);
              for ($j=0; $j < $xmlKeyCount2; $j++) {
                  $arrayXmlKeyList[$xmlKeyName][$j] =  array();

                  $xmlKeyCount3 = count($xml[$xmlKeyName][$j]);
                  $xmlKeyList3  = array_keys($xml[$xmlKeyName][$j]);

                for ($k=0; $k < $xmlKeyCount3; $k++) {
                  $arrayXmlKeyList[$xmlKeyName][$j][$k] =  array();

                  if(array_key_exists($xmlKeyList3[$k], $arrayXmlKeyList[$xmlKeyName][$j][$k])){
                    echo "ok 2 - ";
                  }else {
                    $arrayXmlKeyList[$xmlKeyName][$j][$k] = $xmlKeyList3[$k];
                    //array_push($arrayXmlKeyList[$xmlKeyName][$j][$k], $xmlKeyList3[$k]);
                  }
                }
              }
          }else { // xml içeriisnde ""ürünler > ürün gibi" yapı bulunuyor ise
            $arrayXmlKeyList[$xmlKeyName] =  array();

            $xmlKeyCount2 = count($xml[$xmlKeyName]);           // bir alt array sayısı alnıyor
            $xmlKeyList2   = array_keys($xml[$xmlKeyName]);     //bir alt array anahterdeğerleri alnıyor

            for ($k=0; $k < $xmlKeyCount2 ; $k++) {

              $xmlKeyName2 = $xmlKeyList2[$k];

              $xmlKeyCount3 = count($xml[$xmlKeyName][$xmlKeyName2]);           // bir alt array sayısı alnıyor
              $xmlKeyList3   = array_keys($xml[$xmlKeyName][$xmlKeyName2]);     //bir alt array anahterdeğerleri alnıyor

              $XmlServices->xmlUrunAdet = $xmlKeyCount3 ;          //Xml deki urun Sayısını veritabanına kayıt et
                //print_r($xmlKeyList2[1]);
                for ($j=0; $j < $xmlKeyCount2; $j++) {
                    $arrayXmlKeyList[$xmlKeyName][$xmlKeyName2][$j] =  array();

                    $xmlKeyCount3 = count($xml[$xmlKeyName][$xmlKeyName2][$j]);
                    $xmlKeyList3  = array_keys($xml[$xmlKeyName][$xmlKeyName2][$j]);

                  for ($k=0; $k < $xmlKeyCount3; $k++) {
                    $arrayXmlKeyList[$xmlKeyName][$xmlKeyName2][$j][$k] =  array();

                    if(array_key_exists($xmlKeyList3[$k], $arrayXmlKeyList[$xmlKeyName][$xmlKeyName2][$j][$k])){
                      echo "ok 2 - ";
                    }else {
                      $arrayXmlKeyList[$xmlKeyName][$xmlKeyName2][$j][$k] = $xmlKeyList3[$k];
                      //array_push($arrayXmlKeyList[$xmlKeyName][$j][$k], $xmlKeyList3[$k]);
                    }
                  }
                }
            }
          }
        }
      }
      //print_r($xmlKeyList2);
    }

     // print_r(array_keys($arrayXmlKeyList));
     // print_r(array_keys($arrayXmlKeyList['urun']));
     // print_r(array_keys($arrayXmlKeyList['urun'][0]));

     /**
     *****************************************************************************************************************
     *                        Yeni Xml array ile ana xml dosyasındaki tüm keyler toplanıyor.
     *                        sonrasında array unique ile aynı olan keyleri silip database aktarıyoruz.
     *****************************************************************************************************************
     */

     $newXml = array();                                                       //Yeni xml array
     $XmlKeyCount = count($arrayXmlKeyList);                                  //önceki array sayısını alıyoruz.
     $XmlKeyList = array_keys($arrayXmlKeyList);                              //önceki array griş keylerini alıyoruz.

     $xmlKeyName = $XmlKeyList[0];
     if ($xml[$xmlKeyName] < 1) {
       for ($i=0; $i < $XmlKeyCount ; $i++) {

         $xmlKeyName = $XmlKeyList[$i];                                         // i değişkenine göre arrayda aramak üzere key adını değişkene alıyoruz.

         $XmlKeyCount2 = count($arrayXmlKeyList[$xmlKeyName]);                  //alt arraydan deikendeki key adı ile array sayısını alıyouz
         $XmlKeyList2 = array_keys($arrayXmlKeyList[$xmlKeyName]);              //alt array değiken deki key adı ile array keylerini alıyoruz.


         for ($j=0; $j < $XmlKeyCount2 ; $j++) {

           $newXml = array_merge($newXml, $arrayXmlKeyList[$xmlKeyName][$j] );  //ürün keylerinin olduğu arrayları birleştiriyorum

         }
     }

   }else {

     for ($i=0; $i < $XmlKeyCount ; $i++) {

       $xmlKeyName = $XmlKeyList[$i];                                         // i değişkenine göre arrayda aramak üzere key adını değişkene alıyoruz.

       $XmlKeyCount2 = count($arrayXmlKeyList[$xmlKeyName]);                  //alt arraydan deikendeki key adı ile array sayısını alıyouz
       $XmlKeyList2 = array_keys($arrayXmlKeyList[$xmlKeyName]);              //alt array değiken deki key adı ile array keylerini alıyoruz.


       for ($k=0; $k < $XmlKeyCount2; $k++) {

         $xmlKeyName2 = $XmlKeyList2[$k];
         for ($j=0; $j < $XmlKeyCount2 ; $j++) {

           $newXml = array_merge($newXml, $arrayXmlKeyList[$xmlKeyName][$xmlKeyName2][$j] );  //ürün keylerinin olduğu arrayları birleştiriyorum

         }
       }
   }
   }

     //print_r(array_unique($newXml));
     $newXmlEdit[0] = (array_unique($newXml)); //Database aktarırken benzer keyler sildikten sonra json olarak gönderiyruz.
     $newXmlEdit[1] = [
       '0' => '',
       '1' => '',
       '2' => '',
       '3' => '',
       '4' => '',
       '5' => '',
       '6' => '',
       '7' => '',
       '8' => '',
       '9' => '',
       '10' => '',
       '11' => '',
       '12' => '',
       '13' => '',
       '14' => '',
       '15' => '',
       '16' => '',
     ];

     $XmlServices->urunBilgileri = json_encode($newXmlEdit);
     $XmlServices->save();


    return redirect()->back();
  }

    /**
    *
    *****************************************************************************
    *                          Xml Service
    * 1. databaseXmlDelete metodu Yeni xml silmek için kullanılacaktır.
    * 2.
    ******************************************************************************
    */

    public function databaseXmlDelete( $id){
      //base64 ile kodlanmış id değerini çözümlüyoruz.
      $id = base64_decode(base64_decode(base64_decode($id)));

      $currentXml = XmlService::find($id);
      $currentXml->delete();

      return redirect()->back();
    }

    /**
    *
    *****************************************************************************
    *                          Xml Service
    * 1. xmlKeyListAdd metodu Xml ürün bilgileri ile veritabanı ürün yapımıza uygun eşleştirme yapılarak
    * 2. Ürün güncellemesi yapılırken kullanılacak kayıtlardır.
    ******************************************************************************
    */



    public function xmlKeyListAdd(Request $request, $id){

      $keyList = $request->input();
      $keyListCount = count($keyList);
      unset($keyList['_token']);
      unset($keyList['button']);

      $xml = xmlService::find($id);

      $databaseXmlKeyList = json_decode($xml->urunBilgileri, 1);
      $databaseXmlKeyList[1] = $keyList;

      $xml->urunBilgileri = json_encode($databaseXmlKeyList);
      $xml->update();
      return redirect()->back();
    }

    public function xmlImport (Request $request){

      $urunlerKeysJson = [                                                      //urunler Modelinin barındırdığı keyleri json olarak ekledik
        'pazaryeriBatchId' => '',
        'adi'  => '',
        'markasi'  => '',
        'fiyati'  => '',
        'saticiFiyatı'  => '',
        'katagorisi'  => '',
        'kdv'  => '',
        'paraBirimi'  => '',
        'aciklama'  => '',
        'stokCode'  => '',
        'barcode'  => '',
        'resim'  => '',
        'deci'  => '',
        'stok' => '',
        'varyant'  => '',
        'pazaryeriFiyati'  => '',
        'pazaryeriKategoriBilgileri'  => '',
        'urunDurum'  => '',
        'source'  => ''
      ];

      $urunlerKeysArray = json_decode(json_encode($urunlerKeysJson), true);     //urunler json verisini array a çevir
      $urunlerArrayKeyName = array_keys($urunlerKeysArray);                     //arrayın keylerini eğişkene al
      $frontEndInput = $request->input();                                       //frontEnd inputlarından gelen veriyi değikene al

      for ($i=0; $i < count($urunlerKeysArray); $i++) {
        $KeyName = $urunlerArrayKeyName[$i];                                    //i değişkenine göre urunler dizisinden key değierni al
        if(array_key_exists($KeyName, $frontEndInput)){                         // Urunler key değeri frontEnd dizisinde var mı sorgula
          $urunlerKeysArray[$KeyName] = $request->input($KeyName);              //var ise veritabanına aktaravcağımız arraya ekle
        }
      }

      $urunlerKeysArray['source'] = $request->input('xmlAdi');                  // Arraya son olarak ürünün hangi xmlden dahil edildiğğini ekliyoruz.
      $xmlService                             = XmlService::find($request->id);

      $xmlService->xmlAdi                         = $request->input('xmlAdi');
      $xmlService->xmlLinki                       = $request->input('xmlLinki');
      $xmlService->xmlDurum                       = $request->input('urunDurum');

      $xmlJson                            =  json_decode($xmlService->urunBilgileri);
      //dd($xmlJson);
      $xmlJson[1]                         =  $urunlerKeysArray;


      //dd($request->input());

      // Katagori bilgilerinin alınabilmesi için xml tekrar taranıcak

      $xml = simplexml_load_file($request->input('xmlLinki'),'SimpleXMLElement', LIBXML_NOCDATA);
      $xml = json_decode(json_encode($xml), true);

      $xmlKeyCount = count($xml);           //xml ilk key sayısı
      $xmlKeyList   = array_keys($xml);     //xml ilk anahterdeğerleri

      $xmlJson[2] = json_decode(json_encode($xmlJson[2]), true);
      for ($i=0; $i < $xmlKeyCount; $i++) {
        if(is_array($xml)){
          $xmlKeyName = $xmlKeyList[$i];                   //yeni array alıncak key değeri seçiliyor


            $xmlKeyCount2 = count($xml[$xmlKeyName]);           // bir alt array sayısı alnıyor
            $xmlKeyList2   = array_keys($xml[$xmlKeyName]);     //bir alt array anahterdeğerleri alnıyor

              //print_r($xmlKeyList2[1]);
              for ($j=0; $j < $xmlKeyCount2; $j++) {

                  $xmlKeyCount3 = count($xml[$xmlKeyName][$j]);
                  $xmlKeyList3  = array_keys($xml[$xmlKeyName][$j]);


                  $katagoriKeyName = $xmlJson[1]['katagorisi'];
                  $katagori = $xml[$xmlKeyName][$j][$katagoriKeyName];

                  //dd(json_decode(json_encode($xmlJson)));

                  $xmlJson[2][$j] = $katagori;
              }

        }

        //print_r($xmlKeyList2);
      }
      //dd();

      $xmlJson[2]                         =  array_unique($xmlJson[2]);
      //dd($xmlJson[2] );
      $xmlService->urunBilgileri                 =  json_encode($xmlJson);
      $xmlService->update();

      // dd(json_decode($xml->urunBilgileri));
      Alert("Xml Güncellendi!", "success");
      return redirect('/ayarlar/xml/import');
    }

    public function manuelXmlProductCheck($id){
      /*
      *
      * Ürün veri tabanımızda bulunuyor ise güncellenecek.
      * bulunmuyor ise kayıt edilcek
      *
      */
      libxml_use_internal_errors(true);                                         //Xml Hatalarını Bastır
      $xmlService   = XmlService::find($id);

        $xml = simplexml_load_file($xmlService->xmlLinki, 'SimpleXMLElement', LIBXML_NOCDATA);
        $xml = json_decode(json_encode($xml), true);
        //echo "for l";
        if(!$xml){
          $xmlServiceUpdate = xmlService::find($xmlService->id);
          $xmlServiceUpdate->hata = '1';
          $xmlServiceUpdate->update();
          echo "xmlden hata alındı, döngüden çıkılıyor";                                                          //Xmlden hata alınırsa döngüden çık
        }else {
            if($xmlService->xmlDurum == 'aktif'){
            $databaseXmlServiceJson           = json_decode($xmlService->urunBilgileri);
            $databaseXmlServiceArray          = json_decode(json_encode($databaseXmlServiceJson[1]), true);
            $databaseXmlServiceArrayCount     = count($databaseXmlServiceArray);
            $databaseXmlServiceArrayKeyName   = array_keys($databaseXmlServiceArray);

            //print_r($databaseXmlServiceArrayCount);
            $arrayXmlKeyList = array();

            $xmlKeyCount = count($xml);           //xml ilk key sayısı
            $xmlKeyList   = array_keys($xml);     //xml ilk anahterdeğerleri
            // $xmlKeyList   = array_keys($xml['item']);     //xml ilk anahterdeğerleri
            // $xmlKeyList   = array_keys($xml['item'][0]);     //xml ilk anahterdeğerleri
            //print_r($xmlKeyList);
            for ($i=0; $i < $xmlKeyCount; $i++) {
              $xmlKeyName = $xmlKeyList[$i];                   //yeni array alıncak key değeri seçiliyor
              $arrayXmlKeyList[$xmlKeyName] =  array();

              $xmlKeyCount2 = count($xml[$xmlKeyName]);           // bir alt array sayısı alnıyor
              $xmlKeyList2   = array_keys($xml[$xmlKeyName]);     //bir alt array anahterdeğerleri alnıyor
              //print_r($xmlKeyList2[1]);
              echo $xmlKeyCount2 . '-';
              for ($j=0; $j < $xmlKeyCount2; $j++) {
                  echo $j . '-';
                  $arrayXmlKeyList[$xmlKeyName][$j] =  array();

                  $xmlKeyCount3 = count($xml[$xmlKeyName][$j]);
                  $xmlKeyList3  = array_keys($xml[$xmlKeyName][$j]);

                  $databaseXmlArrayKeyList = json_decode($xmlService->urunBilgileri); //Seçili olan xml bilgilerini yeni arraya alıyoruz.
                  $databaseXmlArrayKeyList = json_decode(json_encode($databaseXmlArrayKeyList[1]), true);  //Seçili olan xml bilgilerini objectto array ile yeni arraya alıyoruz.
                  $databaseXmlArrayKeyName = array_keys($databaseXmlArrayKeyList);

                  //print_r($databaseXmlArrayKeyList);
                  $urunler = new en_product ;  //03/08/2022 güncellemesş ile kullanıma kapatılmıştır.
                  $urunler->name = ' ';        ////03/08/2022 güncellemesş ile kullanıma kapatılmıştır.
                  $urunler['source']       = $xmlService->xmlAdi;
                  $databaseSorgu = 0;

                  for ($k=0; $k < count($databaseXmlArrayKeyList) ; $k++) {

                      $arrayKeyName =   $databaseXmlArrayKeyName[$k];
                      $arrayKeyValue = $databaseXmlArrayKeyList[$arrayKeyName];
                      $urunKontrolValue = $databaseXmlArrayKeyList['stockCode'];
                      //print_r(json_decode(json_encode($xml[$xmlKeyName][$j]), true)) ;
                      if($databaseSorgu < 1){
                        $urunlers = en_product::where('stockCode', $xml[$xmlKeyName][$j][$urunKontrolValue])->first(); //03/08/2022 güncellemesş ile kullanıma kapatılmıştır.

                        $databaseSorgu = 2;
                       }

                    if(array_key_exists($arrayKeyValue, $xml[$xmlKeyName][$j])){
                      // $urunler[$arrayKeyName] = $xml[$xmlKeyName][$j][$arrayKeyValue];

                      $urunler->source       = $xmlService->xmlAdi;
                      if(!$urunlers){
                        //echo "- ";
                        $urunler[$arrayKeyName] = $xml[$xmlKeyName][$j][$arrayKeyValue]; //03/08/2022 güncellemesş ile kullanıma kapatılmıştır.
                        $urunler->save();
                      }else {
                        $urunler = en_product::find($urunlers->id); //03/08/2022 güncellemesş ile kullanıma kapatılmıştır.

                        if($arrayKeyName == 'category'){
                          $kategori = $this->tekliKategoriBul($xml[$xmlKeyName][$j][$arrayKeyValue]);

                          $urunler[$arrayKeyName] = $kategori;
                        }else {
                          $urunler[$arrayKeyName] = $xml[$xmlKeyName][$j][$arrayKeyValue]; //03/08/2022 güncellemesş ile kullanıma kapatılmıştır.
                        }
                        $urunler->update(); //03/08/2022 güncellemesş ile kullanıma kapatılmıştır.
                  }
                }
              }
            }
          }
        }
      }

      $this->xmlKategorileBul();
    }

    public function xmlProductCheck(){
      /*
      *
      * Ürün veri tabanımızda bulunuyor ise güncellenecek.
      * bulunmuyor ise kayıt edilcek
      *
      */

      libxml_use_internal_errors(true);                                         //Xml Hatalarını Bastır
      $xmlService   = XmlService::all();
      $xmlCount     = count($xmlService);

      for ($l=0; $l < $xmlCount; $l++) {
        $xml = simplexml_load_file($xmlService[$l]->xmlLinki, 'SimpleXMLElement', LIBXML_NOCDATA);
        $xml = json_decode(json_encode($xml), true);
        //echo "for l";
        if(!$xml){
          $xmlServiceUpdate = xmlService::find($xmlService[$l]->id);
          $xmlServiceUpdate->hata = '1';
          $xmlServiceUpdate->update();
          echo "xmlden hata alındı, döngüden çıkılıyor";                                                          //Xmlden hata alınırsa döngüden çık
        }else {
            if($xmlService[$l]->xmlDurum == 'aktif'){
            $databaseXmlServiceJson           = json_decode($xmlService[$l]->urunBilgileri);
            $databaseXmlServiceArray          = json_decode(json_encode($databaseXmlServiceJson[1]), true);
            $databaseXmlServiceArrayCount     = count($databaseXmlServiceArray);
            $databaseXmlServiceArrayKeyName   = array_keys($databaseXmlServiceArray);

            //print_r($databaseXmlServiceArrayCount);
            $arrayXmlKeyList = array();

            $xmlKeyCount = count($xml);           //xml ilk key sayısı
            $xmlKeyList   = array_keys($xml);     //xml ilk anahterdeğerleri
            // $xmlKeyList   = array_keys($xml['item']);     //xml ilk anahterdeğerleri
            // $xmlKeyList   = array_keys($xml['item'][0]);     //xml ilk anahterdeğerleri
            //print_r($xmlKeyList);
            for ($i=0; $i < $xmlKeyCount; $i++) {
              $xmlKeyName = $xmlKeyList[$i];                   //yeni array alıncak key değeri seçiliyor
              $arrayXmlKeyList[$xmlKeyName] =  array();

              $xmlKeyCount2 = count($xml[$xmlKeyName]);           // bir alt array sayısı alnıyor
              $xmlKeyList2   = array_keys($xml[$xmlKeyName]);     //bir alt array anahterdeğerleri alnıyor
              //print_r($xmlKeyList2[1]);
              echo $xmlKeyCount2 . '-';
              for ($j=0; $j < $xmlKeyCount2; $j++) {
                  echo $j . '-';
                  $arrayXmlKeyList[$xmlKeyName][$j] =  array();

                  $xmlKeyCount3 = count($xml[$xmlKeyName][$j]);
                  $xmlKeyList3  = array_keys($xml[$xmlKeyName][$j]);

                  $databaseXmlArrayKeyList = json_decode($xmlService[$l]->urunBilgileri); //Seçili olan xml bilgilerini yeni arraya alıyoruz.
                  $databaseXmlArrayKeyList = json_decode(json_encode($databaseXmlArrayKeyList[1]), true);  //Seçili olan xml bilgilerini objectto array ile yeni arraya alıyoruz.
                  $databaseXmlArrayKeyName = array_keys($databaseXmlArrayKeyList);

                  //print_r($databaseXmlArrayKeyList);
                  $urunler = new en_product ;
                  $urunler->name = ' ';
                  $databaseSorgu = 0;

                  for ($k=0; $k < count($databaseXmlArrayKeyList) ; $k++) {

                      $arrayKeyName =   $databaseXmlArrayKeyName[$k];
                      $arrayKeyValue = $databaseXmlArrayKeyList[$arrayKeyName];
                      $urunKontrolValue = $databaseXmlArrayKeyList['stockCode'];
                      //print_r(json_decode(json_encode($xml[$xmlKeyName][$j]), true)) ;
                      if($databaseSorgu < 1){
                        $urunlers = en_product::where('stockCode', $xml[$xmlKeyName][$j][$urunKontrolValue])->first();
                        $databaseSorgu = 2;
                       }

                    if(array_key_exists($arrayKeyValue, $xml[$xmlKeyName][$j])){
                      // $urunler[$arrayKeyName] = $xml[$xmlKeyName][$j][$arrayKeyValue];

                      $urunler->source       = $xmlService[$l]->xmlAdi;
                      if(!$urunlers){
                        //echo "- ";
                        $urunler[$arrayKeyName] = $xml[$xmlKeyName][$j][$arrayKeyValue];
                        // $urunler['source']       = $xmlService[$l]->xmlAdi;
                        $urunler->save();
                      }else {
                        $urunler = en_product::find($urunlers->id);
                        $urunler[$arrayKeyName] = $xml[$xmlKeyName][$j][$arrayKeyValue];
                        // $urunler['source']        = $xmlService[$l]->xmlAdi;
                        $urunler->update();
                  }
                }
              }
            }
          }
        }
      }
    }
    }

    public function xmlEditInfo(Request $request, $id){

      $xmlEdit = XmlService::find($id);
      dd($request->input());
    }

    public function xmlKategorileBul(){

        $urunKategorileri = en_product::all();

        //Ana kategoriler
        for ($i=0; $i < count($urunKategorileri); $i++) {
          $kategoriler = explode('>', $urunKategorileri[$i]->category);
          $findkategori = XmlKategori::where('categoryAdi', $kategoriler[0] )->first();
          if($findkategori){


          }else {
            $addCat = new XmlKategori;
            $addCat->categoryAdi = $kategoriler[0];
            $addCat->save();
          }
        }

        //Bir alt Katoriler
        for ($i=0; $i < count($urunKategorileri); $i++) {
          try {
            $kategoriler = explode('>', $urunKategorileri[$i]->category);
            $findkategori = XmlKategori::where('categoryAdi', $kategoriler[1] )->first();
            if($findkategori){


            }else {
              $addCat = new XmlKategori;
              $addCat->categoryAdi =    $kategoriler[1];
              $addCat->parentCategory = $kategoriler[0];
              $addCat->save();
            }
          } catch (\Exception $e) {

          }
        }

        //Alt Katoriler
        for ($i=0; $i < count($urunKategorileri); $i++) {
          try {
            $kategoriler = explode('>', $urunKategorileri[$i]->category);
            $findkategori = XmlKategori::where('categoryAdi', $kategoriler[2] )->first();
            if($findkategori){


            }else {
              $addCat = new XmlKategori;
              $addCat->categoryAdi =    $kategoriler[2];
              $addCat->parentCategory = $kategoriler[1];
              $addCat->save();
            }
          } catch (\Exception $e) {

          }

        }
      }

    public function tekliKategoriBul($kategori){
      $cat = "";
      $kategoriler = explode('>', $kategori);
      $findkategori = XmlKategori::where('categoryAdi', $kategoriler[0] )->first();
      if($findkategori){


      }else {
        $addCat = new XmlKategori;
        $addCat->categoryAdi = $kategoriler[0];
        $addCat->save();
      }

      //alt kategori bul
      try {
        $kategoriler = explode('>', $kategori);
        $findkategori = XmlKategori::where('categoryAdi', $kategoriler[1] )->first();
        if($findkategori){

          $cat =    $kategoriler[1];
        }else {
          $addCat = new XmlKategori;
          $addCat->categoryAdi =    $kategoriler[1];
          $addCat->parentCategory = $kategoriler[0];
          $addCat->save();
          $kategori =    $kategoriler[1];
        }
      } catch (\Exception $e) {

      }

      //en alt kategoriler
      try {
        $kategoriler = explode('>', $kategori);
        $findkategori = XmlKategori::where('categoryAdi', $kategoriler[2] )->first();
        if($findkategori){


          $kategori =    $kategoriler[2];
        }else {
          $addCat = new XmlKategori;
          $addCat->categoryAdi =    $kategoriler[2];
          $addCat->parentCategory = $kategoriler[1];
          $addCat->save();

          $cat =    $kategoriler[2];
        }
      } catch (\Exception $e) {

      }
      return $cat;
    }


    public function kategoriFiyatAdd($kategori){

      $kategori == Cat::find($kategori);

      if($kategori){

        //$kategori->
      }else {


      }
    }
}
