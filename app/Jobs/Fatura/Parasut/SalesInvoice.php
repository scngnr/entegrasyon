<?php

namespace App\Jobs\Fatura\Parasut;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Scngnr\Orders\Service;
use Scngnr\Parasut\Parasut;

class SalesInvoice implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        $orderClass = new Service;
        $parasutClass = new Parasut;

        $orders = $orderClass->order->index();

        for ($i=0; $i < count($orders); $i++) {
          //Fatura Kesilmemiş ise
          if(! $orders[$i]->faturaNo){

            //Fatura Detay Listesini Al
            $orderDetail = $orderClass->orderDetail->findOrderDetail($orders[$i]->id);
            $orderDetail->billingAddress = json_decode($orderDetail->billingAddress);
            //Faturaya konu edilen ürün listesini al
            $orderDetailItem = $orderClass->orderDetailItem->findOrderDetailItems($orders[$i]->id);

            //Sipariş veren Müşteri Bilgileri Veritabanında kayıtlı mı ?
            $orderCustomer = $orderClass->orderCustomer->findOrderCustomer($orderDetail->billingAddress->email);
            //Müşteri Paraşütte kayıtlı mı?
            $parasutCustomer = $parasutClass->customerMatch->where($orderCustomer->id);
            if($parasutCustomer){

            }else {
              //Müşteriyi Parşüte kayıt Et
              //Parasut conctacts Controlleri Çağır
              $controller = new \Scngnr\Parasut\Http\Controllers\ContactsController();
              //Parasutten dönen müşteri bilgilerini Veritabanına kayıt et
              $customer = $controller->create($orderDetail->billingAddress);
              $parasutClass->customerMatch->create($orderCustomer->id, $customer['data']['id']);
            }

            $salesController = new \Scngnr\Parasut\Http\Controllers\salesInvoiceController();
            //Fatura taslağı oluşturulmak üzere Sipaiş bilgilerini parşüte ilet
            $faturaInfo = $salesInvoiceRsponse = $salesController->create($orders[$i], $orderDetail, $orderDetailItem);
            //Gelen fatura numarasını veritabanına kayıt et
            $orderClass->order->updateFaturaNo($orders[$i]->id, $faturaInfo['data']['id']);
          }
        }
    }
}
