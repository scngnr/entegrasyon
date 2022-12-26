<?php

namespace Scngnr\Mdent\PriceService\Http\Controllers;

use App\Models\Urunler;
use Illuminate\Http\Request;
use Automattic\WooCommerce\Client;
use Illuminate\Routing\Controller;
use Scngnr\Mdent\PriceService\Models\priceService;

class PriceServiceController extends Controller
{
  public function priceForm(Request $request){
    $urunId = $request->segment(2);

    return view('priceService::priceForm', compact('urunId'));
  }

  public function productPriceUpdate(Request $request){

    //ürün dashboard sayfasında seçilmiş comboboxların arrayını url içerisine eklemiştik. Url içerisinden ürün idlerini alıyoruz.
    $urunId = json_decode(base64_decode(base64_decode($request->segment(2))), true);
    //ürün id adedince döngü aç
    for ($i=0; $i < count($urunId); $i++) {

      $findProduct = Urunler::find($urunId[$i]);
      //Daha önce aynı ürüne herhanhi bir platform için fiyat girilmiş mi ?
      $priceServiceFindProduct = priceService::where('urunId', $findProduct->id)->first();
      //Daha önce kayıt edilmiş fiyat bulunuyor ise güncelle
      if($priceServiceFindProduct){


        $priceService = priceService::find($priceServiceFindProduct->id);
        $priceService->urunId = $findProduct->id;
        $priceService->woocommercefiyati = $request->input('carpan');
        $priceService->update();

        //str_split string değişkeni tekli şekilde arraya çıkarır.
        $parcalanmisString = str_split($priceService->woocommercefiyati);
        $matematikOperatorleri = ['+', '-', '/', '*'];

        for ($i=0; $i < 3; $i++) {

           for ($j=0; $j < 4; $j++) {
             //String ifadenin içerisinde herhangi bir matematik operatörü var mı ?
             if($matematikOperatorleri[$i] == $parcalanmisString[$j]){

               dd($matematikOperatorleri[$i]);
             }
           }
        }
      }else {

        $priceService = new priceService;
        $priceService->urunId = $findProduct->id;
        $priceService->woocommercefiyati = $request->input('carpan');
        $priceService->save();
      }
    }
    //dd($request);
    return redirect()->to('/product');
  }
}
