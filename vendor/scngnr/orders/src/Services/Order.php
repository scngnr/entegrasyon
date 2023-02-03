<?php

namespace Scngnr\Orders\Services;

use Scngnr\Orders\Helper\{Exception , Request};
use Scngnr\Orders\Models\en_orders;

Class Order {

      /**
      * Veritabanındaki Tüm Ürünleri Getir
      *
      *
      *  @param bool $paginate --Default False
      *  @param int $paginate   --Value
      *  @version Master -- BetaTest
      *  @author Sercan güngör
      */

    public function index($paginate = FALSE, $paginateValue = 10)
    {
      if($paginate){
        return en_orders::paginate($paginateValue);
      }else {
        return en_orders::all();
      }
    }

    /**
    * Veritabanı Id ile Product Araması
    *
    *
    *  @param int productId
    *  @return array|null product
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */
    public function find($productId){
      return en_orders::find($productId);
    }

    /**
    * Veritabanı Like Araması
    *
    *
    *  @param bool $paginate --Default False
    *  @param int $paginate   --Value
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function findOrder($siparisNo)
    {
    return en_orders::where('siparisNo', $siparisNo)
                          ->first();
    }


    /**
    * Veritabanına Yeni Ürün Ekle
    * @param bool   Status             Ürün Durumu
    * @param string name               Ürün Adı (*)
    * @param
    * @version Master -- BetaTest
    * @author Sercan güngör
    */

    public function create($siparisNo, $magzaId, $status, $tarih, $total)
    {
      $order = new en_orders;
      $order->siparisNo = $siparisNo;
      $order->magzaId   = $magzaId;
      $order->statu   = $status;
      $order->tarihi    = $tarih;
      $order->total     = $total;
      $order->save();

    }

    /**
    * Veritabanındaki Ürünü Güncelle
    * Güncellenebilecek Parametlere Yeni Ürün Ekle Açıklamasından Bakılabilir
    *
    *
    *  @param int Product Id
    *  @param array Product Values
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function update($orderId, $siparisNo, $magzaId, $status, $tarih, $total)
    {
      $order =  en_orders::find($orderId);
      $order->siparisNo = $siparisNo;
      $order->magzaId   = $magzaId;
      $order->statu   = $status;
      $order->tarihi    = $tarih;
      $order->total     = $total;
      $order->update();
    }

    public function updateFaturaNo($orderId, $faturaNo){
      $order =  en_orders::find($orderId);
      $order->faturaNo     = $faturaNo;
      $order->update();

    }
}
