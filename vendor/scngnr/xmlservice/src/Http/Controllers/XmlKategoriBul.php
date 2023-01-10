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

class XmlKategoriBul extends Controller
{
  /**
  *
  *****************************************************************************
  *                          Xml Service
  * 1. databaseXmlKayit metodu Yeni xml eklemek için kullanılacaktır.
  * 2.  Bu method ile xml veritabınna kayıt edilir.
  * 3.  Xml Key bilgileri Kayıt edilir.
  * @param xmlName
  * @param xmlink
  ******************************************************************************
  */

  public function XmlKategoriBul(){

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
            $addCat->parentCategory = $urunKategorileri[$i]->id;
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
            $addCat->parentCategory = $urunKategorileri[$i]->id;
            $addCat->save();
          }
        } catch (\Exception $e) {

        }
      }
    }
}
