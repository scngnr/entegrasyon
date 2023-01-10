<?php

namespace Scngnr\Product;
use Scngnr\Product\Models\en_product;

/**
 *
 */
class Product
{

  public function productIndex(){

    $productSpect = [
      'status' => "Ürün Durumu",
      'name' => "Ürün Adı",
      'price' => "Ürün Fiyatı",
      'regularPrice' => "Ürün Çizili Fiyatı",
      'category' => "Kategorisi",
      'tax' => "Vergi Dilimi",
      'currency' => "Para Birimi",
      'description' => "Açıklaması",
      'stockCode' => "Stok Kodu",
      'gtin' => "Ürün Barkodu",
      'pictures' => "Ürün Resim 1",
      'pictures2' => "Ürün Resim 2",
      'pictures3' => "Ürün Resim 3",
      'pictures4' => "Ürün Resim 4",
      'pictures5' => "Ürün Resim 5",
      'deci' => "Ürün deci si",
      'stock' => "Stok Adeti",
      'varyation' => "Varyasyon Var mı",
      'source' => "",
    ];

    return $productSpect;
  }

  public function productVaryationIndex(){
    $productVaryationSpect = [
      'productId',
      'name',
      'price',
      'regularPrice',
      'stockCode',
      'stock'
    ];

    return $productVaryationSpect;

  }

  public function productFind($sutun, $stockCode){

    return en_product::where($sutun, $stockCode)->first();
  }


    public function productSaves($stokCode , $spect, $source){

      $kontrol = en_product::where('stockCode', $stokCode)->first();
      if($kontrol){
        $product =  en_product::find($kontrol->id);
        // $product[$spect] = $deger;
        $spectKeylist = array_keys($spect);
        for ($i=0; $i < count($spectKeylist) ; $i++) {
          $spectKeyName = $spectKeylist[$i];
          //if(array_key_exists($spectKeyName, $spect)){
          if($spect[$spectKeyName]){
              $product[$spectKeyName] = $spect[$spectKeyName];
          }
        }
        $product->update();
      }else {
        $product = new en_product;
        $product['source'] = $stokCode;
        $spectKeylist = array_keys($spect);
        for ($i=0; $i < count($spectKeylist) ; $i++) {
          $spectKeyName = $spectKeylist[$i];
          if($spect[$spectKeyName]){
            $product[$spectKeyName] = $spect[$spectKeyName];
          }
        }
        $product->save();
      }
    }
}
