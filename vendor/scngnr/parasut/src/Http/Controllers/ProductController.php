<?php

namespace Scngnr\Parasut\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Scngnr\Parasut\Parasut;
use Scngnr\Product\Product;

class ProductController extends Controller
{
  public $parasutClass, $productClass;

  public function __construct(){

    $this->parasutClass = new Parasut;
    $this->productClass = new Product;
  }

  public function index(){

    return $this->parasutClass->products->index();
  }

  public function statu($productId){

    $product = $this->productClass->product->find($productId);
    $productMatch = $this->parasutClass->productMatch->where($productId);

    if($productMatch){
      $this->edit($product, $productMatch);
    }else {
        $response = $this->create($product);
        $this->parasutClass->productMatch->create($productId, $response['data']['id']);
    }
  }


  //Parasut sistemine yeni ürün kayıt etmek için kullanılacak metod
  public function create($product){


    $data = [
      'data' => [
        'id'                          => $product->id,
        'type'                        => "products",
        'attributes' => [
          'code'                      => $product->stockCode,                                   //Ürün Hizmet kodu
          'name'                      => $product->name,                                        //Ürün Hizmet Adı (*)
          'vat_rate'                  => 18,                                                    //Kdv Oranı
          // 'sales_excise_duty'         => $array['attributes']['sales_excise_duty'],          //Satış Ötv
          // 'sales_excise_duty_type'    => $array['attributes']['sales_excise_duty_type'],     //Satış Ötv tipi
          // 'purchase_excise_duty'      => $array['attributes']['purchase_excise_duty'],       //Alış Ötv
          // 'purchase_excise_duty_type' => $array['attributes']['purchase_excise_duty_type'],  //Alış ötv Tipi
          'unit'                      => "Adet",                                                //Birim
          // 'communications_tax_rate'   => $array['attributes']['communications_tax_rate'],    //Öiv ornı
          'archived'                  => false,                                                 //Arşivlenecek mi
          'list_price'                => ($product->price / 1.18 ),                                       //Satış Fiyatı
          'currency'                  => 'TRL',                                                 //Döviz
          'buying_price'              => ($product->price / 1.18 ) / 1.4,                                 //ALış Fiyatı
          'buying_currency'           => 'TRL',                                                 //Alış Döviz
          'inventory_tracking'        => false,                                                 //Stok Takibi
          'initial_stock_count'       => $product->stock,                                       //Başlangıç stok Adeti
          // 'gtip'                      => $array['attributes']['gtip'],                       //Ürünün GTIP kodu - https://uygulama.gtb.gov.tr/Tara adresinden öğrenebilirsiniz
          'barcode'                   => $product->barcode,                                //Ürün Barkdou
        ],
        'releationship' => [
          'inventory_levels' => [
            'data' => [
              'id'  => "",
              'type'  => "",
            ]
          ]
        ],
        'category' => [
          'data' => [
            'id'  => "",
            'type'  => 'item_categories',
          ]
        ]
      ]
    ];

      return $this->parasutClass->products->create($data);

  }

  //Parasüt sistemindeki ürün idsi ile bilgileri çekme
  public function show($id){

    return $this->parasutClass->products->show($id);
  }

  //Parasut kategori ürün ile kategori düzenle
  public function edit($product, $productMatch){

    $data = [
      'data' => [
        'id'                          => $product->id,
        'type'                        => "products",
        'attributes' => [
          'code'                      => $product->stockCode,                                   //Ürün Hizmet kodu
          'name'                      => $product->name,                                        //Ürün Hizmet Adı (*)
          'vat_rate'                  => 18,                                                    //Kdv Oranı
          // 'sales_excise_duty'         => $array['attributes']['sales_excise_duty'],          //Satış Ötv
          // 'sales_excise_duty_type'    => $array['attributes']['sales_excise_duty_type'],     //Satış Ötv tipi
          // 'purchase_excise_duty'      => $array['attributes']['purchase_excise_duty'],       //Alış Ötv
          // 'purchase_excise_duty_type' => $array['attributes']['purchase_excise_duty_type'],  //Alış ötv Tipi
          'unit'                      => "Adet",                                                //Birim
          // 'communications_tax_rate'   => $array['attributes']['communications_tax_rate'],    //Öiv ornı
          'archived'                  => false,                                                 //Arşivlenecek mi
          'list_price'                => ($product->price / 1.18 ),                                       //Satış Fiyatı
          'currency'                  => 'TRL',                                                 //Döviz
          'buying_price'              => ($product->price / 1.18 ) / 1.4,                                 //ALış Fiyatı
          'buying_currency'           => 'TRL',                                                 //Alış Döviz
          'inventory_tracking'        => false,                                                 //Stok Takibi
          'initial_stock_count'       => $product->stock,                                       //Başlangıç stok Adeti
          // 'gtip'                      => $array['attributes']['gtip'],                       //Ürünün GTIP kodu - https://uygulama.gtb.gov.tr/Tara adresinden öğrenebilirsiniz
          'barcode'                   => $product->barcode,                                //Ürün Barkdou
        ],
        'releationship' => [
          'inventory_levels' => [
            'data' => [
              'id'  => "",
              'type'  => "",
            ]
          ]
        ],
        'category' => [
          'data' => [
            'id'  => "",
            'type'  => 'item_categories',
          ]
        ]
      ]
    ];

      return $this->parasutClass->products->edit($productMatch->parasutProductId, $data);
  }

  //Parasut kategori ürün ile kategori sil
  public function delete($id){

    return $this->parasutClass->products->delete($id);
  }
}
