<?php

namespace Scngnr\Parasut\Http\Controllers;

use Illuminate\Routing\Controller;
use Scngnr\Parasut\Parasut;
use Scngnr\Product\Product;

class ContactsController extends Controller
{
  public $parasutClass, $productClass;

  public function __construct(){

    $this->parasutClass = new Parasut;
    $this->productClass = new Product;
  }

  // Parasut sisteminde kayıtlı tüm ürünleri döndürür.
  public function index(){

  }


  public function create($customer){


    $data = [
      'data' => [
        'id'              => "",
        'type'            => "contacts",
        'attributes' => [
          'email'           => $customer->email,                                   //Ürün Hizmet kodu
          'name'            => $customer->first_name . ' ' . $customer->last_name,                                        //Ürün Hizmet Adı (*)
          'shortname'       => '',                                                    //Kdv Oranı
          'contact_type'    => 'person',                                                //Birim
          'tax_office'      => '',                                                 //Arşivlenecek mi
          'tax_number'      => '',                                       //Satış Fiyatı
          'district'        => $customer->city,                                                 //Döviz
          'city'            => 'istanbul',                                 //ALış Fiyatı
          'country'         => 'Türkiye',                                                 //Alış Döviz
          'phone'           => $customer->phone,                                                 //Stok Takibi
          'fax'             => '',                                      //Başlangıç stok Adeti
          'is_abroad'       => false,                              //Ürün Barkdou
          'archived'        => '',
          'iban'            => '',
          'account_type'    => 'customer',
          'untrackable'     => false
        ],
        'releationship'     => [
          'category'        => [
            'data'          => [
              'id'          => "",
              'type'        => 'item_categories',
            ]
          ],
          'contact_people'  => [
            'data'          => [
              'id'          => "",
              'type'        => "",
              'attributes'  => [
                'name'      => "",                                   //Ürün Hizmet kodu
                'email'     => "",                                        //Ürün Hizmet Adı (*)
                'phone'     => "",                                                    //Kdv Oranı
                'notes'     => "",                                                //Birim
              ],
            ]
          ]
        ],
      ]
    ];

    return $this->parasutClass->contacts->create($data);

  }

  public function show(){

  }


  public function edit(){

  }


  public function delete(){
  }

}
