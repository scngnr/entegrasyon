<?php

namespace Scngnr\Orders\Services;

use Scngnr\Orders\Helper\{Exception , Request};
use Scngnr\Orders\Models\en_orders_detail_items;

Class orderDetailItem {

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
        return en_orders_detail_items::paginate($paginateValue);
      }else {
        return en_orders_detail_items::all();
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
      return en_orders_detail_items::find($productId);
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

    public function findOrderDetailItem($orderId)
    {
    return en_orders_detail_items::where('orderId', $orderId)
                          ->first();
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

    public function findOrderDetailItems($orderId)
    {
    return en_orders_detail_items::where('orderId', $orderId)
                          ->get();
    }

    /**
    * Veritabanına Yeni Ürün Ekle
    * @param bool   Status             Ürün Durumu
    * @param string name               Ürün Adı (*)
    * @param int    price              Ürün fiyatı (*)
    * @param int    regularPrice       Üstü Çizili Fiyat
    * @param int    category           Ürün Kategorisi
    * @param int    tax                Ürün vergi Dilimi
    * @param string currency           Ürün parama birimi
    * @param string description        Ürün Açıklaması
    * @param string stockCode          Ürün Stok Kodu
    * @param int    gtin               Ürün Ulusan barkod Numarası
    * @param string pictures (1 - 5 )  Ürün Resim Alanları
    * @param int    deci               Ürün Kargo desi değeri
    * @param int    stock              Ürün Stok Adeti
    * @param bool   varyation          Ürün Varyasyonu Var mı
    * @param string source             Ürün Kaynağı ( Xml - Exel - Manuel vs.)
    * @param
    * @version Master -- BetaTest
    * @author Sercan güngör
    */

    public function create($orderId, $productId, $amount){

      $order = new en_orders_detail_items;
      $order->orderId = $orderId;
      $order->productId   = $productId;
      $order->amount   = $amount;

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

    public function update($id, $orderId, $productId, $amount){

      $order =  en_orders_detail_items::find($orderId);
      $order->orderId = $orderId;
      $order->productId   = $productId;
      $order->amount   = $amount;
      $order->update();
    }
}
