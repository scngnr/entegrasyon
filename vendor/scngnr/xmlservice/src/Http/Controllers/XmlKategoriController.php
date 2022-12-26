<?php

namespace Scngnr\XmlService\Http\Controllers;

use App\Models\Urunler;
use Automattic\WooCommerce\Client;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Scngnr\Mdent\Xmlentegrasyon\Models\XmlKategori;
class XmlKategoriController extends Controller
{
  //Ürünler kategori agacından xml kategoriler oluşturulur.
  public function xmlKategorileBul(Request $request){

    $urunKategorileri = Urunler::all();

    //Ana kategoriler
    for ($i=0; $i < count($urunKategorileri); $i++) {
      $kategoriler = explode('>', $urunKategorileri[$i]->katagorisi);
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
        $kategoriler = explode('>', $urunKategorileri[$i]->katagorisi);
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
        $kategoriler = explode('>', $urunKategorileri[$i]->katagorisi);
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

  public function xmlProductKategoriBul(){

  }
}
