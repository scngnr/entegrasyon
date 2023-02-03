<?php

namespace App\Console\Commands\Fatura\Parasut;

use Illuminate\Console\Command;
use Scngnr\Orders\Service;
use Scngnr\Parasut\Parasut;

class salesInvoice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Fatura:Parasut:salesInvoice';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
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

          //Kayıtlı müşterinin paraşüt Idsini fatura servisine gönder
          $parasutCustomer = $parasutClass->customerMatch->where($orderCustomer->id);
          //SAtış Servisi
          $salesController = new \Scngnr\Parasut\Http\Controllers\salesInvoiceController();
          //Fatura taslağı oluşturulmak üzere Sipaiş bilgilerini parşüte ilet
          $faturaInfo = $salesInvoiceRsponse = $salesController->create($orders[$i], $orderDetail, $orderDetailItem, $parasutCustomer);
          //Gelen fatura numarasını veritabanına kayıt et
          $orderClass->order->updateFaturaNo($orders[$i]->id, $faturaInfo['data']['id']);
        }
      }
    }
}
