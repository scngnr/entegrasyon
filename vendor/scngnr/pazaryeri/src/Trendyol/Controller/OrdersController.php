<?php

namespace Scngnr\Trendyol\Controllers;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    /**
    *
    *
    * @return json Order
    *
    * @version Master --Beta Test
    * @author Sercan Güngör
    */

    public function trendyolOrderCheck(){

      $trendyol = new TrendyolClient();
      $trendyol->setSupplierId(195714);
      $trendyol->setUsername("DOGGhDYrufKJMsVbztGG");
      $trendyol->setPassword("Q7gb1h2ikafdtYSihTjO");

      $trendyolOrders =  $trendyol->order->orderList(	array(
        // Belirli bir tarihten sonraki siparişleri getirir. Timestamp olarak gönderilmelidir.

        'startDate'          => Carbon::now()->subWeek(2)->timestamp,
        // Belirtilen tarihe kadar olan siparişleri getirir. Timestamp olarak gönderilmelidir ve startDate ve endDate aralığı en fazla 2 hafta olmalıdır
        'endDate'            => Carbon::now()->timestamp,
        'page'               => 0,
        // Bir sayfada listelenecek maksimum adeti belirtir. (Max 200)
        'size'               => 200,
        // Sadece belirli bir sipariş numarası verilerek o siparişin bilgilerini getirir
        'orderNumber'        => '',
        // Siparişlerin statülerine göre bilgileri getirir.	(Created, Picking, Invoiced, Shipped, Cancelled, Delivered, UnDelivered, Returned, Repack, UnSupplied)
        'status'             => '',
        // Siparişler neye göre sıralanacak? (PackageLastModifiedDate, CreatedDate)
        'orderByField'       => 'CreatedDate',
        // Siparişleri sıralama türü? (ASC, DESC)
        'orderByDirection'   => 'DESC',
        // Paket numarasıyla sorgu atılır.
        'shipmentPackagesId' => '',
        )
      );
      //dd($trendyolOrders);
      for ($i=0; $i <$trendyolOrders->totalPages;  $i++) {                        //Toplam Sayfa döngüsü
        for ($j=0; $j < $trendyolOrders->size; $j++) {                            //Sayfadaki sipariş döngüsü

          if(array_key_exists($j, $trendyolOrders->content) ){
            $eslesenSiparis = Order::where('siparisNo', $trendyolOrders->content[$j]->orderNumber)->first();
            if( $eslesenSiparis == null){

              $order = new Order;
              $order->pazaryeri           = 'trendyol';
              $order->siparisTarih        =  Carbon::createFromTimestampMsUTC($trendyolOrders->content[$j]->orderDate)->format('Y-m-d H:i:s');
              $order->faturaBilgi         =  json_encode($trendyolOrders->content[$j]);
              $order->siparisNo           =  $trendyolOrders->content[$j]->orderNumber;
              $order->customerName        =  $trendyolOrders->content[$j]->shipmentAddress->fullName;
              $order->save();

            }else {

              $eslesenOrder                      = Order::find($eslesenSiparis->id);
              $eslesenOrder->pazaryeri           = 'trendyol';
              $eslesenOrder->siparisTarih        =  Carbon::createFromTimestampMsUTC($trendyolOrders->content[$j]->orderDate)->format('Y-m-d H:i:s');
              $eslesenOrder->faturaBilgi         =  json_encode($trendyolOrders->content[$j]);
              $eslesenOrder->siparisNo           =  $trendyolOrders->content[$j]->orderNumber;
              $eslesenOrder->customerName        =  $trendyolOrders->content[$j]->shipmentAddress->fullName;
              $eslesenOrder->update();
            }
          }
        }
      }
    }
}
