<?php

namespace Scngnr\Pazaryeri\Wordpress\Controllers;

use Automattic\WooCommerce\Client;
use Illuminate\Routing\Controller;
use Scngnr\Pazaryeri\Wordpress\Service;
use Scngnr\Pazaryeri\Wordpress\Helper\Exception;
use Scngnr\Orders\Service as OrderService;

class OrdersController extends Controller
{

    /**
    *
    *
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function Order($magzaId)
    {
      $wordpressClass = new Service;
      $orderClass = new OrderService;

      //Idsi verilen mağzanın tüm siparişlerini al
      $wordpressOrderList = $wordpressClass->Order->index($magzaId);

      for ($i=0; $i < count($wordpressOrderList); $i++) {
        //Veritabanında var mı kontrol et
        $order = $orderClass->order->findOrder($wordpressOrderList[$i]->id);
        if($order){
          $orderClass->order->update ($order->id,
                                      $wordpressOrderList[$i]->id,
                                      $magzaId,
                                      $wordpressOrderList[$i]->status,
                                      $wordpressOrderList[$i]->date_created,
                                      $wordpressOrderList[$i]->total);
        }else {
          //Veritabanında yok ise kayıt et
          $orderClass->order->create($wordpressOrderList[$i]->id,
                                      $magzaId,
                                      $wordpressOrderList[$i]->status,
                                      $wordpressOrderList[$i]->date_created,
                                      $wordpressOrderList[$i]->total);
        }
      }
    }
    /**
    *
    *
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function orderDetail($magzaId){

      $wordpressClass = new Service;
      $orderClass = new OrderService;

      //Idsi verilen mağzanın tüm siparişlerini al
      $wordpressOrderList = $wordpressClass->Order->index($magzaId);
      for ($i=0; $i < count($wordpressOrderList); $i++) {
        //Veritabanında var mı kontrol et
        $order = $orderClass->order->findOrder($wordpressOrderList[$i]->id);
        if($order){

          $orderDetail = $orderClass->orderDetail->findOrderDetail($order->id);
          if($orderDetail){

            $orderClass->orderDetail->update($orderDetail->id, $order->id, json_encode($wordpressOrderList[$i]->billing), json_encode($wordpressOrderList[$i]->shipping), $wordpressOrderList[$i]->customer_id);
          }else {

            $orderClass->orderDetail->create($order->id, json_encode($wordpressOrderList[$i]->billing), json_encode($wordpressOrderList[$i]->shipping), $wordpressOrderList[$i]->customer_id);
          }
        }
      }
    }

    /**
    *
    *
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function orderDetailItem($magzaId){

      $wordpressClass = new Service;
      $orderClass = new OrderService;

      //Idsi verilen mağzanın tüm siparişlerini al
      $wordpressOrderList = $wordpressClass->Order->index($magzaId);
      for ($i=0; $i < count($wordpressOrderList); $i++) {
        //Veritabanında var mı kontrol et
        $order = $orderClass->order->findOrder($wordpressOrderList[$i]->id);
        if($order){

          $orderDetailtem = $orderClass->orderDetailItem->findOrderDetailItem($order->id);

          for ($j=0; $j < count($wordpressOrderList[$i]->line_items) ; $j++) {
            if($orderDetailtem){

              $orderClass->orderDetailItem->update($orderDetailtem->id, $order->id, $wordpressOrderList[$i]->line_items[$j]->product_id, $wordpressOrderList[$i]->line_items[$j]->quantity);
            }else {

              $orderClass->orderDetailItem->create($order->id, $wordpressOrderList[$i]->line_items[$j]->product_id, $wordpressOrderList[$i]->line_items[$j]->quantity);
            }
          }
        }
      }
    }

    /**
    *
    *
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function orderCustomer($magzaId){

      $wordpressClass = new Service;
      $orderClass = new OrderService;

      $wordpressOrderList = $wordpressClass->Order->index($magzaId);

      for ($i=0; $i < count($wordpressOrderList); $i++) {

        $orderCustomer = $orderClass->orderCustomer->findOrderCustomer($wordpressOrderList[$i]->billing->email);
        if($orderCustomer){
          $orderClass->orderCustomer->update($orderCustomer->id, $wordpressOrderList[$i]->billing->first_name,
                                              $wordpressOrderList[$i]->billing->last_name, $wordpressOrderList[$i]->billing->company,
                                              $wordpressOrderList[$i]->billing->address_1, $wordpressOrderList[$i]->billing->address_2,
                                              $wordpressOrderList[$i]->billing->city, $wordpressOrderList[$i]->billing->state,
                                              $wordpressOrderList[$i]->billing->postcode, $wordpressOrderList[$i]->billing->country,
                                              $wordpressOrderList[$i]->billing->phone, $wordpressOrderList[$i]->billing->email);
        }else {
          $orderClass->orderCustomer->create( $wordpressOrderList[$i]->billing->first_name,
                                              $wordpressOrderList[$i]->billing->last_name, $wordpressOrderList[$i]->billing->company,
                                              $wordpressOrderList[$i]->billing->address_1, $wordpressOrderList[$i]->billing->address_2,
                                              $wordpressOrderList[$i]->billing->city, $wordpressOrderList[$i]->billing->state,
                                              $wordpressOrderList[$i]->billing->postcode, $wordpressOrderList[$i]->billing->country,
                                              $wordpressOrderList[$i]->billing->phone, $wordpressOrderList[$i]->billing->email);
        }
      }
    }












}
