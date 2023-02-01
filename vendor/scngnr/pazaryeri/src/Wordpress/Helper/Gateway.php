<?php

namespace Scngnr\Pazaryeri\Wordpress\Helper;

use Scngnr\Pazaryeri\Wordpress\Services;
use Scngnr\Pazaryeri\Wordpress\exception;
use Scngnr\Pazaryeri\Wordpress\Helper\Request;

Class Gateway {

  /**
  *@description
  *
  *Binance apiKey and apiSecret
  *
  *
  */
  protected $apiKey, $apiSecret;

  public function __construct()
  {

  }

  protected $allServices = array(
    'Coupon'                => 'Coupon',
    'Customer '             => 'Customer',
    'Order'                => 'Order',
    'Ordernote'             => 'Ordernote',
    'Refunds'               => 'Refunds',
    'product'               => 'product',
    'Productvariations'     => 'Productvariations',
    'Productattribute'      => 'Productattribute',
    'Productattributeterm'  => 'Productattributeterm',
    'Productcategories'     => 'Productcategories',
    'Productshippingclass'  => 'Productshippingclass',
    'Producttag'            => 'Producttag',
    'Productreviews'        => 'Productreviews',
    'Reports'               => 'Reports',
    'Taxrates'              => 'Taxrates',
    'Taxclasses'            => 'Taxclasses',
    'Settings'              => 'Settings',
    'Settingoptions'        => 'Settingoptions',
    'Paymentgateways'       => 'Paymentgateways',
    'Shippingzones'         => 'Shippingzones',
    'Shippingzonelocations' => 'Shippingzonelocations',
    'Shippingzonemethods'   => 'Shippingzonemethods',
    'Shippingmethods'       => 'Shippingmethods',
    'Systemstatus'          => 'Systemstatus',
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
    $serviceName = "Scngnr\Pazaryeri\\Wordpress\Services\\" .  $serviceName;
    if (!class_exists($serviceName)) {
      throw new exception("Geçersiz Dosya Yolu!");
    }
    return new $serviceName($this->apiKey, $this->apiSecret);
  }
}
