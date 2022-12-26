<?php

namespace Scngnr\Product\Http\Controllers;

use Automattic\WooCommerce\Client;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Scngnr\Xmlservice\Models\XmlKategori;
use Scngnr\Product\Models\pazaryeri_fiyat;
use Scngnr\Product\Models\pazaryeri_info;
use Scngnr\Product\Models\pazaryeri_product_info;
use Scngnr\Product\Models\en_product;
use Scngnr\Product\Models\product_kategori;

class MarketPlaceController extends Controller
{

  /**
  *
  * WooCommerce Çoklu ürün yükleme/Güncelleme methodudur
  * @param mazgaId
  * @param array $productıd
  *
  */

  public function addMultiWoocommerce( $mazgaId, $products){

    $products = json_decode($products);
    for ($i=0; $i < count($products); $i++) {
      $this->addWoocommerce($mazgaId, $products[$i]);
      sleep(1.2);
    }
  }

  /**
  *
  * WooCommerce tekli ürün yükleme/Güncelleme methodudur
  * @param mazgaId
  * @param array $id
  *
  */
  public function addWoocommerce($mazgaId , $id){

    $urun = en_product::find($id);

    $magza = pazaryeri_info::find($mazgaId);
    $pazaryeriFiyat = pazaryeri_fiyat::where('productId', $id)->get();
    $databaseProductKategori = product_kategori::where('categoryName' , $urun->category)->first();

    //Ürün için veritabanındaki tüm fiyatlandırmaları al
    for ($i=0; $i < count($pazaryeriFiyat) ; $i++) {
      //aktif fiyatı ürüne ekle
      if($pazaryeriFiyat[$i]->status == 'checked'){
        $urun->price = $pazaryeriFiyat[$i]->fiyat;
      }
    }

    $woocommerce = new Client( "https://$magza->magazaLink/", "$magza->appKey", "$magza->secretKey",
      [
        'version' => 'wc/v3',
      ]
    );

    //resim url lerini jaydetmek üzere array oluştur
    $images = [];
    //veritabanı resim sütunları
    $productPictures = ['pictures','pictures2','pictures3', 'pictures4' , 'pictures5'];
    //VEri tababnı kayıtları adetince for döngüsü oluştur
    for ($i=0; $i < count($productPictures) ; $i++) {
      //array içerisinden veritabanı sütun adını al
      $keyName = $productPictures[$i];
      //sütun kontrol et. Dolu ise arraya ekle null ise işlem yapma
      if($urun[$keyName]){
        array_push($images, array('src' => $urun[$keyName]));
      }
    }

    //WooCommerce Ayarlarında kategori bilgisi auto ise xml kategori bilgileri ile kayıt edilecektir.
    //WooCommerce Ayarlarında otomatik kategori şeçildiyse
    $category = true ;
    $xml2Category = "";
    $xmlParentCategory = "" ;
    if($category){

      $xmlAltCategory = XmlKategori::where('categoryAdi', $urun->category)->first();

      if($xmlAltCategory->parentCategory){
        $xml2Category = XmlKategori::where('categoryAdi', $xmlAltCategory->parentCategory)->first();
        //dd( $xml2Category->categoryAdi . '>' . $xmlAltCategory->categoryAdi);

        if($xml2Category->parentCategory){

          $xmlParentCategory = XmlKategori::where('categoryAdi', $xmlAltCategory->parentCategory)->first();
          //dd($xmlParentCategory->categoryAdi . '>' . $xml2Category->categoryAdi . '>' . $xmlAltCategory->categoryAdi);
        }
      }

      // Kategori dizisi
      $data = [
        'name' => $urun->category,
        'image' => [
            'src' => $urun->pictures
        ]
      ];

      if($databaseProductKategori){
        //Şuan güncelleme işlmi bulunmuyor
      }else {
        $productKategoriInfo = $woocommerce->post('products/categories', $data);

        $databaseProductKategori = new product_kategori;
        $databaseProductKategori->categoryName = $urun->category;
        $databaseProductKategori->productMagzaId = $magza;
        $databaseProductKategori->productkategoriId = $productKategoriInfo->id;
        $databaseProductKategori->save();
      }
    }



    $data = [
        'name' => $urun->name,
        'type' => 'simple',
        'regular_price' => $urun->price,
        'description' => $urun->description,
        'short_description' => $urun->aciklma,
        'stock_quantity' => $urun->stock,
        'manage_stock' => true,
        "sku" => $urun->stockCode,
        'categories' => [
                [
                    'id' => $databaseProductKategori->productkategoriId
                ]
            ],
        'images' => $images
    ];

    try{
      $kayitlimi = pazaryeri_product_info::where('productId', $id)->first();
      //Urun pazaryeri veritaninrabkayitli ise
      if($kayitlimi){
        //pazaeyeri kayitlarini al
        $sonuc = $woocommerce->put("products/$kayitlimi->pazaryeriProductId", $data);
        //wooxommerce datasindan gelen veriye gore kayitlari guncelle
        $product = pazaryeri_product_info::find($kayitlimi->id);
        $product->productId = $id;
        $product->magzaId   = $magza->id;
        $product->pazaryeriProductId = $sonuc->id;
        $product->categoryId = Null;

        $product->update();
      }else {
        //Urun pazaryeri verotababninda kayitli degil ise
        $sonuc = $woocommerce->post('products', $data);
        //Woocommerce datasindan gelen veriye gore pazaryeeine urunkayitlarini ekle
        $product = new pazaryeri_product_info;
        $product->productId = $id;
        $product->magzaId   =  $magza->id;
        $product->pazaryeriProductId = $sonuc->id;
        $product->categoryId = Null;

        $product->save();

      }
    }catch(Exception $e) {
      dd($id);
    }
    //return redirect()->back();
  }
}
