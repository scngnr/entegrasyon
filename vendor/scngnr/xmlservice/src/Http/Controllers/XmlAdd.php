<?php

namespace Scngnr\XmlService\Http\Controllers;

use Scngnr\Xmlservice\Models\XmlService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class XmlAdd extends Controller
{
  public function xmlAdd(Request $request){
    ini_set('memory_limit', '3000M');
    ini_set('max_execution_time', '300');
    // dd($request->input());
    $XmlServices = new XmlService;
    $XmlServices->xmlAdi         = $request->input('xmlName');
    $XmlServices->xmlLinki       = $request->input('xmlLink');
    $XmlServices->xmlDurum       = 0;
    $xml = simplexml_load_file($XmlServices->xmlLinki,'SimpleXMLElement', LIBXML_NOCDATA);
    $xml = json_decode(json_encode($xml), true);
    $xmlKeyList = array();
    $xmlKey = array();
    $xkey= "";
    //Xml İlk Array Key değerini ve Value $xmlKey değişkenine aktarma
    foreach ($xml as $key => $value) {
      $xkey = $key;
      $xmlKey[] = $value;
    }
    if(count($xmlKey) < 2 ){
      $xmlKey =   $xmlKey[0];   //BOş 0 indisini sil
      for ($i=0; $i < count($xmlKey); $i++) {
        $XmlServices->xmlUrunAdet       =  count($xmlKey);
        $keyList = array_keys($xmlKey[$i]);
        $xmlKeyList = array_merge($xmlKeyList, $keyList  );
        $xmlKeyList = (array_unique($xmlKeyList));
      }
    }else {
      //Xml İkinci Array Key değerini ve Value $xmlKey değişkenine aktarma
      foreach ($xmlKey as $key => $value) {
        $xkey = $key;
        $xmlKey[] = $value;
      }
      $xmlKey =   $xmlKey[$xkey][0];   //BOş 0 indisini sil
        for ($i=0; $i < count($xmlKey); $i++) {
          $XmlServices->xmlUrunAdet       =  count($xmlKey);
          $keyList = array_keys($xmlKey[$i]);
          $xmlKeyList = array_merge($xmlKeyList, $keyList);
          $xmlKeyList = (array_unique($xmlKeyList));
        }
    }
    $databaseXml[0] = $xmlKeyList;
    $databaseXml[1] = [
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
    $databaseXml[2] = $xkey;
    $XmlServices->urunBilgileri  =  json_encode($databaseXml);
    $XmlServices->save();
    return redirect()->back();
  }
}
