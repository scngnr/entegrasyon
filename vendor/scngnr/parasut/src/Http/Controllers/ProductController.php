<?php

namespace Scngnr\Parasut\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Scngnr\Parasut\Parasut;

class ProductController extends Controller
{
  public $parasutClass;

  public function __construct(){

    $this->parasutClass = new Parasut;
  }

  public function index(){

    return $this->parasutClass->products->index();
  }

  //Parasut sistemine yeni ürün kayıt etmek için kullanılacak metod
  public function create(){

    $data = [
      'data' => [
        'id'                          => $array['id'],
        'type'                        => $array['type'],
        'attributes' => [
          'code'                      => $array['attributes']['code'],                          //Ürün Hizmet kodu
          'name'                      => $array['attributes']['name'],                          //Ürün Hizmet Adı (*)
          'vat_rate'                  => $array['attributes']['vat_rate'],                      //Kdv Oranı
          // 'sales_excise_duty'         => $array['attributes']['sales_excise_duty'],          //Satış Ötv
          // 'sales_excise_duty_type'    => $array['attributes']['sales_excise_duty_type'],     //Satış Ötv tipi
          // 'purchase_excise_duty'      => $array['attributes']['purchase_excise_duty'],       //Alış Ötv
          // 'purchase_excise_duty_type' => $array['attributes']['purchase_excise_duty_type'],  //Alış ötv Tipi
          'unit'                      => $array['attributes']['unit'],                          //Birim
          // 'communications_tax_rate'   => $array['attributes']['communications_tax_rate'],    //Öiv ornı
          'archived'                  => $array['attributes']['archived'],                      //Arşivlenecek mi
          'list_price'                => $array['attributes']['list_price'],                    //Satış Fiyatı
          'currency'                  => $array['attributes']['currency'],                      //Döviz
          // 'buying_price'              => $array['attributes']['buying_price'],               //ALış Fiyatı
          // 'buying_currency'           => $array['attributes']['buying_currency'],            //Alış Döviz
          'inventory_tracking'        => $array['attributes']['inventory_tracking'],            //Stok Takibi
          'initial_stock_count'       => $array['attributes']['initial_stock_count'],           //Başlangıç stok Adeti
          // 'gtip'                      => $array['attributes']['gtip'],                       //Ürünün GTIP kodu - https://uygulama.gtb.gov.tr/Tara adresinden öğrenebilirsiniz
          'barcode'                   => $array['attributes']['barcode'],                       //Ürün Barkdou
        ],
        'releationship' => [
          'inventory_levels' => [
            'data' => [
              'id'  => $array['releationship']['id'],
              'type'  => $array['releationship']['type'],
            ]
          ]
        ],
        'category' => [
          'data' => [
            'id'  => $array['category']['id'],
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
  public function edit($id){

    $data = [
      'data' => [
        'id'                          => $array['id'],
        'type'                        => $array['type'],
        'attributes' => [
          'code'                      => $array['attributes']['code'],                          //Ürün Hizmet kodu
          'name'                      => $array['attributes']['name'],                          //Ürün Hizmet Adı (*)
          'vat_rate'                  => $array['attributes']['vat_rate'],                      //Kdv Oranı
          // 'sales_excise_duty'         => $array['attributes']['sales_excise_duty'],          //Satış Ötv
          // 'sales_excise_duty_type'    => $array['attributes']['sales_excise_duty_type'],     //Satış Ötv tipi
          // 'purchase_excise_duty'      => $array['attributes']['purchase_excise_duty'],       //Alış Ötv
          // 'purchase_excise_duty_type' => $array['attributes']['purchase_excise_duty_type'],  //Alış ötv Tipi
          'unit'                      => $array['attributes']['unit'],                          //Birim
          // 'communications_tax_rate'   => $array['attributes']['communications_tax_rate'],    //Öiv ornı
          'archived'                  => $array['attributes']['archived'],                      //Arşivlenecek mi
          'list_price'                => $array['attributes']['list_price'],                    //Satış Fiyatı
          'currency'                  => $array['attributes']['currency'],                      //Döviz
          // 'buying_price'              => $array['attributes']['buying_price'],               //ALış Fiyatı
          // 'buying_currency'           => $array['attributes']['buying_currency'],            //Alış Döviz
          'inventory_tracking'        => $array['attributes']['inventory_tracking'],            //Stok Takibi
          'initial_stock_count'       => $array['attributes']['initial_stock_count'],           //Başlangıç stok Adeti
          // 'gtip'                      => $array['attributes']['gtip'],                       //Ürünün GTIP kodu - https://uygulama.gtb.gov.tr/Tara adresinden öğrenebilirsiniz
          'barcode'                   => $array['attributes']['barcode'],                       //Ürün Barkdou
        ],
        'releationship' => [
          'inventory_levels' => [
            'data' => [
              'id'  => $array['releationship']['id'],
              'type'  => $array['releationship']['type'],
            ]
          ]
        ],
        'category' => [
          'data' => [
            'id'  => $array['category']['id'],
            'type'  => 'item_categories',
          ]
        ]
      ]
    ];

      return $this->parasutClass->products->update($id, $data);
  }

  //Parasut kategori ürün ile kategori sil
  public function delete($id){

    return $this->parasutClass->products->delete($id);
  }
}
