<?php

namespace Scngnr\Mdent\FaturaEnt\InvoiceService\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;
use Automattic\WooCommerce\Client;
use Illuminate\Routing\Controller;
use Scngnr\Mdent\PriceService\Models\priceService;
use Illuminate\Support\Facades\Http;

class N11Invoice extends Controller
{

  public function create(){

    $order = Order::find(707);
    $orderDetail = json_decode($order->faturaBilgi, 1);
    $orderDetail = $orderDetail['orderDetail'];
    //dd(Carbon::now()->format('Y/m/d'));
    dd(json_decode($order->faturaBilgi, 1));

    $data = [
      'data' => [
        'id' => $orderDetail['orderNumber'],
        'type' => "sales_invoices",
        'attributes' => [
          'item_type' => "invoice",
          'description' => $orderDetail['orderNumber'] . ' Nolu N11 Sipariş faturası',
          'issue_date' => Carbon::now()->format('Y/m/d'),
          'due_date' => Carbon::now()->addDays(7)->format('Y/m/d'),
          'invoice_series' => "Ent",
          'invoice_id' => 1,
          'currency' => "TRL",
          'exchange_rate' => 0,
          'withholding_rate' => 0,
          'vat_withholding_rate' => 0,
          'invoice_discount_type' => "percentage",
          'invoice_discount' => 0,
          'billing_address' => $orderDetail['billingAddress']['address'],
          'billing_phone' => $orderDetail['billingAddress']['gsm'],
          'billing_fax' => 1,
          'tax_office' => NULL,
          'tax_number' => NULL,
          'country' => "turkey",
          'city' => $orderDetail['billingAddress']['city'],
          'district' => $orderDetail['billingAddress']['district'],
          'is_abroad' => False,
          'order_no' => $orderDetail['orderNumber'],
          'order_date' => Carbon::now()->format('Y/m/d'),
          'shipment_addres' => $orderDetail['shippingAddress']['address'],
          'shipment_included' => false,
          'cash_sale' => false,
          //'payment_account_id' => 0,
          'payment_date' => Carbon::now()->addDays(14)->format('Y/m/d'),
          'payment_description' => Carbon::now()->addDays(14)->format('Y/m/d'),
        ],
        'relationships' => [
          'details' => [
            'data' => [
              array(
                      //'id' => "76885",
                        'type' => "sales_invoice_details",
                        'attributes' => [
                          'quantity' => 1,
                          'unit_price' => 15,
                          'vat_rate' => 18,
                          'discount_type' => "percentage",
                          'discount_value' => 0,
                          'excise_duty_type' => "percentage",
                          'excise_duty_value' => 0,
                          'communications_tax_rate' => 0,
                          'description' => "rdhdfhj",
                          'delivery_method' => "CFR",
                          'shipping_method' => "Karayolu",
                        ],
                        'relationships' => [
                          'product' => [
                            'data' => [
                              'id' => "26391544",
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
              )
            ]
          ],
          'contact' => [
            'data' => [
              'id'=> '80040093',
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

    //dd($data);
    $invoiceService = new \Scngnr\Mdent\FaturaEnt\Parasut\Http\Controllers\SatisFatuasi();
    //dd($invoiceService->create($data));
  }
}
