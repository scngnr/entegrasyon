<?php

namespace Scngnr\Parasut\Helper;

use Scngnr\Parasut\Exception;

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
    'accounts'          => 'accounts',
    'bankFees'          => 'bankFees',
    'contacts'          => 'contacts',
    'eArchive'          => 'eArchive',
    'eInvoiceInboxes'   => 'eInvoiceInboxes',
    'eInvoices'         => 'eInvoices',
    'employees'         => 'employees',
    'eSmm'              => 'eSmm',
    'inventoryLevels'   => 'inventoryLevels',
    'productCategories' => 'productCategories',
    'products'          => 'products',
    'purchaseBill'      => 'purchaseBill',
    'salaries'          => 'salaries',
    'salesInvoice'      => 'salesInvoice',
    'shipmentDocuments' => 'shipmentDocuments',
    'stockMovements'    => 'stockMovements',
    'tags'              => 'tags',
    'taxes'             => 'taxes',
    'warehouses'        => 'warehouses',

    //Veritabanı Tarafı
    'productMatch'      => 'productMatch',
    'categoryMatch'     => 'categoryMatch',
    'customerMatch'     => 'customerMatch',
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
      throw new Bnexception("Geçersiz Servis!");
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
   * @author Sercan gungor <scngnr@gmail.com>
   * @param string $serviceName
   * @return string
   *
   */
  protected function createServiceInstance($serviceName)
  {
    //dd($serviceName);
    $serviceName = "Scngnr\Parasut\Services\\" .  $serviceName;
    if (!class_exists($serviceName)) {
      throw new Exception("Geçersiz Dosya Yolu!");
    }
    return new $serviceName($this->apiKey, $this->apiSecret);
  }
}
