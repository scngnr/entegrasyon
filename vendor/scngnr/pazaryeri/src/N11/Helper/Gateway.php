<?php

namespace Scngnr\N11\Helper;
use Scngnr\N11\exception;

Class Gateway {

  /**
  *@description
  *
  *Binance apiKey and apiSecret
  *
  *
  */
  public $apiKey;
  public $apiSecret;

  protected $allServices = array(
    'categoryService'                     => 'CategoryService',                     // Kategori Servisleri
    'CityService'                         => 'CityService',                         //Şehir Servisleri
    'ProductService'                      => 'ProductService',                      //Ürün Servisleri
    'ProductSellingService'               => 'ProductSellingService',               //Ürün Satış Servisleri
    'ProductStockService'                 => 'ProductStockService',                 //Ürün Stok Servisleri
    'OrderService'                        => 'OrderService',                        //Sipariş Servisleri
    'ShipmentCompanyService'              => 'ShipmentCompanyService',              //Kargo Şirketi Servisi
    'ShipmentService'                     => 'ShipmentService',                     //Teslimat Şablonu Servisi
    'SettlementService'                   => 'SettlementService',                   //Satış/Uzlaşma Servisi
    'TicketService'                       => 'TicketService',                       //Mağaza Talep Servisi
    'SapCommissionEInvoiceDetailService'  => 'SapCommissionEInvoiceDetailService',  //Sap Commission E-Invoice Detail  Servisi
    'SapBankStatementEInvoiceService'     => 'SapBankStatementEInvoiceService',     //Sap Bank Statement E-Invoice  Servisi
    'ClaimCancelService'                  => 'ClaimCancelService',                  //Sipariş İptal Talepleri Servis
    'ReturnService'                       => 'ReturnService',                       //Sipariş İade Talepleri Servisi
    'ClaimExchangeService'                => 'ClaimExchangeService',                //Sipariş Değişim Talepleri Servis
    'InvoiceService'                      => 'InvoiceService',                      //E-Fatura Servisi
    'CatalogService'                      => 'CatalogService',                      //Katalog Servisleri
  );

  /**
 *
 * @description REST Api servislerinin ilk çağırma için hazırlanması
 * @param string
 * @return service
 *
 */
  public function __get($names)
  {
    $service = $this->allServices[$names];

    if (!isset($this->allServices[$names])) {
      dd($service);
      throw new exception("Geçersiz Servis!");
    }

    if (isset($this->$names)) {
      return $this->$names;
    }

    $this->$names = $this->createServiceInstance($this->allServices[$names]);
    return $this->$names;
  }

  /**
   *
   * Servis sınıfının ilk örneğini oluşturma
   *
   * @author Ismail Satilmis <ismaiil_0234@hotmail.com>
   * @param string $serviceName
   * @return string
   *
   */
  protected function createServiceInstance($serviceName)
  {
    //dd($serviceName);
    $serviceName = "Scngnr\N11\Services\\" .  $serviceName;
    if (!class_exists($serviceName)) {
      throw new exception("Geçersiz Dosya Yolu!");
    }
    return new $serviceName($this->apiKey, $this->apiSecret);
  }
}
