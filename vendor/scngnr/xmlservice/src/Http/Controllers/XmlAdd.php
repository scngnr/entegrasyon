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

class XmlAdd extends Controller
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
  function _array_key_exists($cur_key, $arr){
    foreach ($arr as $key => $val){
        if ($key == $cur_key){
            return true;
        }
        if (is_array($val)){
            return _array_key_exists($cur_key, $val);
        }
    }
    return false;
  }

  public function xmlAdd(Request $request){

    ini_set('memory_limit', '3000M');
    ini_set('max_execution_time', '300');

    // dd($request->input());
    $XmlServices = new XmlService;

    $XmlServices->xmlAdi         = $request->input('xmlName');
    $XmlServices->xmlLinki       = $request->input('xmlLink');
    $XmlServices->xmlDurum       = 'aktif degil';

    // $xml = simplexml_load_file($request->input('xmlLink'));
    $xml = simplexml_load_file("https://www.ilktoptan.com/ilktoptan",'SimpleXMLElement', LIBXML_NOCDATA);
    // $xml = simplexml_load_file("http://localhost/entegrasyon/public/xml/salyangoz-export.xml",'SimpleXMLElement', LIBXML_NOCDATA);
    $xml = json_decode(json_encode($xml), true);

    $xmlKeyList = array();
    $xmlKey = array();
    $xkey= "";
    foreach ($xml as $key => $value) {

      $xkey = $key;
      $xmlKey[] = $value;
    }
      $xmlKey =   $xmlKey[0];   //BOş 0 indisini sil
      for ($i=0; $i < count($xmlKey); $i++) {

        $keyList = array_keys($xmlKey[$i]);
        $xmlKeyList = array_merge($xmlKeyList, $keyList  );
        $xmlKeyList = (array_unique($xmlKeyList));
      }
      // dd(($xmlKeyList));
    dd(($xml[$xkey][5]));




    return redirect()->back();
  }
}
