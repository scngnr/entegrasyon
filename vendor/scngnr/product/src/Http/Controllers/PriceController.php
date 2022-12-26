<?php

namespace Scngnr\Product\Http\Controllers;

use Automattic\WooCommerce\Client;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Scngnr\Mdent\Xmlentegrasyon\Models\XmlKategori;
use Scngnr\Product\Models\pazaryeri_fiyat;
use Scngnr\Product\Models\pazaryeri_info;
use Scngnr\Product\Models\en_product;

class PriceController extends Controller
{


  public function index(Request $request, $id){
    $prductFind = en_product::find($id);

    $price = new pazaryeri_fiyat;
    $price->productId = $id;
    $price->pazaryeri               = $request->input('pazaryeri');
    $price->magaza                  = $request->input('magaza');
    $price->fiyatKaynak             = $request->input('fiyat');

    $productPrice = 0;
    if($request->input('fiyat') == 'BF'){ //BF == Base fiyat

      switch ($request->input('islem')) {
        case 'toplama': $productPrice = $prductFind->price +  $request->input('deger'); break;
        case 'cikarma': $productPrice = $prductFind->price -  $request->input('deger'); break;
        case 'bolme':   $productPrice = $prductFind->price *  $request->input('deger'); break;
        case 'carpma':  $productPrice = $prductFind->price /  $request->input('deger'); break;
      }
    }
    $price->fiyat                   = $productPrice;
    $price->indirimliFiyat          = $request->input('');
    $price->indirimliFiyatBaslangic = $request->input('');
    $price->indirimliFiyatBitis     = $request->input('');

    $price->save();

    return redirect()->back();
  }



    public function index2($magza, $magzaId, $fiyat, $islem, $formul, $products){

      $products = json_decode($products);

      for ($i=0; $i < count($products) ; $i++) {

        $prductFind = en_product::find($products[$i]);

        $price = new pazaryeri_fiyat;
        $price->productId = $prductFind->id;
        $price->pazaryeri               = $magza;
        $price->magaza                  = $magzaId;
        $price->fiyatKaynak             = $fiyat;

        $productPrice = 0;
        if($fiyat == 'BF'){ //BF == Base fiyat

          switch ($islem) {
            case 'toplama': $productPrice = $prductFind->price +  $formul; break;
            case 'cikarma': $productPrice = $prductFind->price -  $formul; break;
            case 'carpma':   $productPrice = $prductFind->price *  $formul; break;
            case 'bolme':  $productPrice = $prductFind->price /  $formul; break;
          }
        }
        $price->fiyat                   = $productPrice;

        $price->save();
      }



      return redirect()->back();
    }


  public function checkStatus(Request $request, $id, $status){

      // $pf = pazaryeri_fiyat::all();
      // for ($i=0; $i <count($pf) ; $i++) {
      //
      //   if($id == $pf[$i]->id){
      //     $findPf = pazaryeri_fiyat::find($id);
      //     $findPf->status = $status;
      //     $findPf->update();
      //   }elseif($status == NULL) {
      //
      //     $findPf = pazaryeri_fiyat::find($id);
      //     $findPf->status = NULL;
      //     $findPf->update();
      //   }else {
      //
      //     $findPf = pazaryeri_fiyat::find($pf[$i]->id);
      //     $findPf->status = NULL;
      //     $findPf->update();
      //   }
      // }

      $pf = pazaryeri_fiyat::find($id);
      $pfMagza = pazaryeri_fiyat::where('magaza', $pf->magaza)->get();

      for ($i=0; $i <count($pfMagza) ; $i++) {

        if($id == $pfMagza[$i]->id){
          $findPf = pazaryeri_fiyat::find($id);
          $findPf->status = $status;
          $findPf->update();
        }elseif($status == NULL) {

          $findPf = pazaryeri_fiyat::find($id);
          $findPf->status = NULL;
          $findPf->update();
        }else {

          $findPf = pazaryeri_fiyat::find($pfMagza[$i]->id);
          $findPf->status = NULL;
          $findPf->update();
        }
      }


      return pazaryeri_fiyat::all();
  }

  public function pazaryeri(Request $request, $pazaryeri){


      return pazaryeri_info::where('platform', $pazaryeri)->get();
  }

  public function multipleStatus($durum, $products){

    $product = json_decode($products);
    for ($i=0; $i < count($product); $i++) {

      $this->statusUpdate($durum, $product[$i]);
    }
  }

  public function statusUpdate($durum, $id){

    $pp = en_product::find($id);
    $pp->status = $durum;
    $pp->update();

  }
}
