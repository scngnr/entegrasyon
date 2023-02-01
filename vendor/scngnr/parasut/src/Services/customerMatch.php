<?php

namespace Scngnr\Parasut\Services;

use Scngnr\Parasut\Helper\Exception;
use Scngnr\Parasut\Helper\Request;
use Scngnr\Parasut\Models\en_parasut_customer;

class customerMatch
{


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
          return en_parasut_customer::paginate($paginateValue);
        }else {
          return en_parasut_customer::all();
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
        return en_parasut_customer::find($productId);
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

    public function where($customerId)
    {
      return en_parasut_customer::where('customerId', $customerId)
                                    ->first();
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

      public function create($customerId, $parasutCustomerId)
      {
        $product = new en_parasut_customer;
        $product->customerId = $customerId;
        $product->parasutCustomerId = $parasutCustomerId;
        $product->save();
      }

      /**
      * Kayıtlı Ürünün Durumunu Güncelle
      *
      *
      *   @param int Product Id
      *   @param int Status değeri
      *       -- 0 Pasif (Satışta Değil)
      *       -- 1 Taslak
      *       -- 2 Stok Yok
      *       -- 3 Aktif (Satışta)
      *
      *   @version Master -- BetaTest
      *   @author Sercan güngör
      */

      public function status($productId, $status)
      {
        $spect['status'] = $status;
        $this->update($productId, $spect);
      }

      /**
      * Veritabanındaki Ürünü Sil
      *
      *
      *   @param int Product Id
      *   @version Master -- BetaTest
      *   @author Sercan güngör
      */

      public function delete($productId)
      {
        $product =  en_parasut_customer::find($productId);
        $product->delete();
      }
}
