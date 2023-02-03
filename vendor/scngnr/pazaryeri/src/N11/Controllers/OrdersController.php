<?php

namespace Scngnr\PazarYeri\N11\Controllers;

use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    /*
    * //////////////////////////////////////////////////////////////////////////
    *                         N11 Siparişleri Çekme İşlemi
    * ///////////////////////////////////////////////////////////////////////////
    */

    public function n11OrdersCheck(){


      $id = Order::where('pazaryeri', 'n11')->get();
      //dd(count($id)/100);
      $pazaryeri = Pazaryeri::find(1);                                          //N11 Pazaryeri bilgileri alınıyor
      $apikey = json_decode($pazaryeri->apikey);                                //N11 Pazaryeri bilgileri arraya çevriliyor

      $client = new N11Client();
      $client->setApiKey($apikey->apiKey);
      $client->setApiPassword($apikey->apiSecret);


      $orderList = $client->order->orderList(
          array(
                  //Sipariş oluşturma tarihi başlangıç
              		'period'            => array(
              			// Başlangıç Tarihi => d/m/Y H:i:s
                    'startDate' => Carbon::now()->subDays(14)->format('d/m/Y') ,
                    // Bitiş Tarihi => d/m/Y H:i:s
                    'endDate'   => Carbon::now()->format('d/m/Y')
              		),
                'sortForUpdateDate' => false,               // Güncellenen Siparişleri Listeler
                'pagingData' => array(                		  // Sayfalama
                'currentPage' => 0,  			                  // Şuanki Sayfa
                'pageSize'    => 100                        // Gösterilecek nesne
                )
              )
            );
            //dd($orderList);
            //print_r($orderList);
            //echo $orderList->orderList->order->createDate;
            //print_r($client->order->orderDetail($orderList->orderList->order->id));

            $orderCount = 0;
      for ($i=0; $i < $orderList->pagingData->pageCount  ; $i++) {

        $orderList = $client->order->orderList(
            array(
                    //Sipariş oluşturma tarihi başlangıç
                		'period'            => array(
                			// Başlangıç Tarihi => d/m/Y H:i:s
                			'startDate' => Carbon::now()->subDays(14)->format('d/m/Y') ,
                			// Bitiş Tarihi => d/m/Y H:i:s
                			'endDate'   => Carbon::now()->format('d/m/Y')
                		),
                  'sortForUpdateDate' => false,               // Güncellenen Siparişleri Listeler
                  'pagingData' => array(                		  // Sayfalama
                  'currentPage' => $i,  			                  // Şuanki Sayfa
                  'pageSize'    => 100                        // Gösterilecek nesne
                  )
                )
              );

          //dd($orderList);
          $dongu = true;
          for ($j=0; $j <  $orderList->pagingData->pageSize && $dongu; $j++) {


            $OrderIsHas =     Order::where('siparisNo', $orderList->orderList->order[$j]->id)->first();
            $orderDetails             = $client->order->orderDetail($orderList->orderList->order[$j]->id);             //Gelen Sipariş numarasından sipariş bilgilerini al
            //dd($orderDetails);
            if($OrderIsHas == null){

              //echo $orderList->orderList->order[$j]->id;
              $ex = explode(' ',$orderList->orderList->order[$j]->createDate);                                          //Tarih ve saati ayır
              $ex2 = explode('/', $ex[0]);                                                                              //Tarihi yıl ün ay olacak şekilde böl
              $newDate = Carbon::createFromFormat('Y/m/d H:i', "$ex2[2]/$ex2[1]/$ex2[0] $ex[1]")->toDateTimeString();   // 1975-05-21 22:00:00

              //dd($newDate);
              $orders = new Order;
              $orders->pazaryeri        = 'N11';
              $orders->siparisTarih     = $newDate;
              $orders->faturaBilgi      = json_encode($orderDetails);
              $orders->siparisNo        = $orderList->orderList->order[$j]->id;
              $orders->customerName     = $orderDetails->orderDetail->shippingAddress->fullName;
              $orders->save();

              $orderCount++;
            }

            if($OrderIsHas){
              $eslesenSiparis           = Order::find($OrderIsHas->id);                 //Veritabanı sipariş kaydını bul

              $ex = explode(' ',$orderList->orderList->order[$j]->createDate);                                          //Tarih ve saati ayır
              $ex2 = explode('/', $ex[0]);                                                                              //Tarihi yıl ün ay olacak şekilde böl
              $newDate = Carbon::createFromFormat('Y/m/d H:i', "$ex2[2]/$ex2[1]/$ex2[0] $ex[1]")->toDateTimeString();   // 1975-05-21 22:00:00

              $eslesenSiparis->pazaryeri        = 'N11';
              $eslesenSiparis->siparisTarih     = $newDate;
              $eslesenSiparis->faturaBilgi      = json_encode($orderDetails);
              $eslesenSiparis->siparisNo        = $orderList->orderList->order[$j]->id;
              $eslesenSiparis->customerName     = $orderDetails->orderDetail->shippingAddress->fullName;
              $eslesenSiparis->update();
            }
            if($j == $orderList->pagingData->totalCount - 1){
              $dongu = false;
            }
            sleep(2);
          }
       }
    }

    /*
    * //////////////////////////////////////////////////////////////////////////
    *                         Trendyol Siparişleri Çekme İşlemi
    * ///////////////////////////////////////////////////////////////////////////
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

    /*
    * //////////////////////////////////////////////////////////////////////////
    *                         Lazımbana Siparişleri Çekme İşlemi
    * ///////////////////////////////////////////////////////////////////////////
    */

    public function LazimbanaOrdersCheck(){

      $list = [
              ];

      $client = new Client();
      $credentials = base64_encode('ZKPUR4VG:Q7gb1h2ikafdtYSihTjO');
      $client = new Client([
                    'headers' => [ 'Content-Type' => 'application/json',
                    'Authorization'   => 'Basic ' . $credentials, ]
                ]);
                $list['body'] = json_encode($list['body']);
      $response = $client->post('https://api.lazimbana.com/v2', $list);
      $body = json_decode($response->getBody()->getContents(),true);

      dd($body);
    }

    /*
    * //////////////////////////////////////////////////////////////////////////
    *                         Lazımbana Siparişleri Çekme İşlemi
    * ///////////////////////////////////////////////////////////////////////////
    */

    public function HepsiBuradaOrdersCheck(){
      /////////////////////////////////////////////////////////////////////////
      //Ödemesi Tamamlanan Siparişler
      $credentials = base64_encode('canticarett_dev:Ct_12345!');
      $merchantid  = '{171a95de-9151-44e7-aaf1-fff423152e38}';


      $client = new Client();
      $response = $client->request('GET', "https://oms-external.hepsiburada.com/orders/merchantid/$merchantid?offset=0&limit=100", [
        'headers' => [
            'Content-Type'    => 'application/json',
            'Authorization'   => 'Basic ' . $credentials,
        ],
          ]);

      $body = json_decode($response->getBody()->getContents(),true);

      for ($i=0; $i < count($body['items']) ; $i++) {

        $orderNumber = $body['items'][$i]['orderNumber'];

        if(array_key_exists('orderNumber', $body['items'][$i])){
          $orderNumber = $body['items'][$i]['orderNumber'];
        }else {
          $orderNumber = '';
        }

        //orderNumber kayıtlı mı

        $eslesenSiparis = Order::where('siparisNo', $orderNumber)->first();


        if($eslesenSiparis){

          $eslesenSiparis = Order::find($eslesenSiparis->id);
          $eslesenSiparis->pazaryeri = 'Hepsiburada';
          $eslesenSiparis->siparisTarih = $body['items'][$i]['orderDate'];
          $eslesenSiparis->faturaBilgi = json_encode($body['items'][$i]);
          $eslesenSiparis->siparisNo = $orderNumber;
          $eslesenSiparis->customerName = $body['items'][$i]['shippingAddress']['name'];
          $eslesenSiparis->update();
        }else{

            $eslesenSiparis = new Order;
            $eslesenSiparis->pazaryeri = 'Hepsiburada';
            $eslesenSiparis->siparisTarih = $body['items'][$i]['orderDate'];
            $eslesenSiparis->faturaBilgi = json_encode($body['items'][$i]);
            $eslesenSiparis->siparisNo = $orderNumber;
            $eslesenSiparis->customerName = $body['items'][$i]['shippingAddress']['name'];
            $eslesenSiparis->save();
        }
      }
              //dd($body);
      ////////////////////////////////////////////////////////////////////////////
      //Paketlenmiş Siparişler
      $response = $client->request('GET', "https://oms-external.hepsiburada.com/packages/merchantid/$merchantid?offset=0&limit=10", [
          'headers' => [
              'Content-Type'    => 'application/json',
              'Authorization'   => 'Basic ' . $credentials,
          ],
            ]);
      $body = json_decode($response->getBody()->getContents(),true);

      for ($i=0; $i < count($body); $i++) {

        $customerName = $body[$i]['recipientName'];

        $sorgu = Order::where('customerName', $customerName)->first();
        if ($sorgu) {

          $eslesenSiparis = Order::find($sorgu->id);
          $eslesenSiparis->pazaryeri = 'Hepsiburada';
          $eslesenSiparis->siparisTarih =  Carbon::createFromTimestampMsUTC($body[$i]['orderDate'])->format('Y-m-d H:i:s');
          $eslesenSiparis->hbNewPackageJsonData = json_encode($body[$i]);
          $eslesenSiparis->hbPackageNumber = $body[$i]['packageNumber'];
          $eslesenSiparis->customerName =$body[$i]['recipientName'];
          $eslesenSiparis->update();
        }else {

          $eslesenSiparis = new Order;
          $eslesenSiparis->pazaryeri = 'Hepsiburada';
          $eslesenSiparis->siparisTarih =  Carbon::createFromTimestampMsUTC($body[$i]['orderDate'])->format('Y-m-d H:i:s');
          $eslesenSiparis->hbNewPackageJsonData = json_encode($body[$i]);
          $eslesenSiparis->hbPackageNumber = $body[$i]['packageNumber'];
          $eslesenSiparis->customerName =$body[$i]['recipientName'];
          $eslesenSiparis->save();
        }
      }
    }
}
