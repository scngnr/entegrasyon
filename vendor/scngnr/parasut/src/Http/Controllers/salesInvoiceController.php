<?php

namespace Scngnr\Parasut\Http\Controllers;

use Illuminate\Routing\Controller;
use Scngnr\Parasut\Parasut;
use Carbon\Carbon;
use Scngnr\Product\Product;
use Scngnr\Parasut\Helper\apiData;

class salesInvoiceController extends Controller
{

    use apiData;
  public $parasutClass, $productClass;


  public function __construct(){

    $this->parasutClass = new Parasut;
    $this->productClass = new Product;
  }
  // Parasut sisteminde kayıtlı tüm kategorileri döndürür.
  public function index(){

  }


  public function create($order, $orderDetail, $orderDetailItem, $parasutCustomer){

    $orderItem = array();
    for($i=0; $i < count($orderDetailItem); $i++) {

      //Sipariş Kaleminde wordpress id si bulunan ürüün bizim veritabanımızdaki id sini al
      $wpProductInfo = $this->productClass->pazaryeriMatchInfo->where($orderDetailItem[$i]->productId);
      //Ürünün veritabındaki bilgilerini al
      $productInfo = $this->productClass->product->find($wpProductInfo->productId);
      //ürünün Parasüt Id sini al
      $parasutProductInfo = $this->parasutClass->productMatch->where($wpProductInfo->productId);

      $orderItem[$i] = array(

            //'id' => "76885",
              'type' => "sales_invoice_details",
              'attributes' => [
                'quantity' => $orderDetailItem[$i]->amount,
                'unit_price' => $productInfo->price / 1.18 ,
                'vat_rate' => 18,
                'discount_type' => "percentage",
                'discount_value' => 0,
                'excise_duty_type' => "percentage",
                'excise_duty_value' => 0,
                'communications_tax_rate' => 0,
                'description' => "",
                'delivery_method' => "CFR",
                'shipping_method' => "Karayolu",
              ],
              'relationships' => [
                'product' => [
                  'data' => [
                    'id' => $parasutProductInfo->parasutProductId,
                    'type' => "products",
                  ]
                ],
                // 'warehouse' => [
                //   'data' => [
                //     'id' => "26391544",
                //     'type' => "warehouses",
                //   ]
                // ]
              ]
        )   ;
    }

    $data = [
      'data' => [
        'id'              => 1,
        'type'            => "sales_invoices",
        'attributes' => [
          'item_type'       => "invoice",
          'issue_date'      => Carbon::now()->format('Y/m/d'),
          'due_date'        => Carbon::now()->addDays(7)->format('Y/m/d'),
          'invoice_series'  => 'end',                                                //Birim
          'invoice_id'      => NULL,                                                 //Arşivlenecek mi
          'currency'        => 'TRL',                                       //Satış Fiyatı
          'exchange_rate'   => 'TRY',                                                 //Döviz
          'withholding_rate'=> 0,                                 //ALış Fiyatı
          'vat_withholding_rate'  => 0,                                                 //Alış Döviz
          'invoice_discount_type' => 'percentage',                                                 //Stok Takibi
          'invoice_discount'      =>  0,                                      //Başlangıç stok Adeti
          'billing_address'       => $orderDetail->billingAddress->address_1,                              //Ürün Barkdou
          'billing_phone'         => $orderDetail->billingAddress->phone,
          'billing_fax'           => '',
          'tax_office'            => NULL,
          'tax_number'            => NULL,
          'country'               => $orderDetail->billingAddress->country,
          'district'              => $orderDetail->billingAddress->city,
          'is_abroad'             => false,
          'order_no'              => 454545,
          'order_date'            => Carbon::now()->format('Y/m/d'),
          'shipment_addres'       => $orderDetail->billingAddress->address_1,
          'shipment_included'     => false,
          'cash_sale'             => false,
          'payment_account_id'    => '',
          'payment_date'          => '',
          'payment_description'   => '',
        ],
        'relationships' => [
          'details' => [
            'data' => $orderItem
          ],
          'contact' => [
            'data' => [
              'id'=> $parasutCustomer->parasutCustomerId,
              'type' => 'contacts'
            ]
          ],
          // 'category' => [
          //   'data' => [
          //     'id' => "7499902",
          //     'type' => "item_categories",
          //   ]
          // ],
        ],
      ]
    ];

    return $this->parasutClass->salesInvoice->create($data);
  }


  public function show($id){

  }


  public function edit($id, $array){

  }


  public function delete($id){

  }

}
