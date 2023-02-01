<?php

namespace Scngnr\Orders\Services;

use Scngnr\Orders\Helper\{Exception , Request};
use Scngnr\Orders\Models\en_order_customer;

Class orderCustomer {

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
        return en_order_customer::paginate($paginateValue);
      }else {
        return en_order_customer::all();
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
      return en_order_customer::find($productId);
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

    public function findOrderCustomer($customerMail)
    {
      return en_order_customer::where('email', $customerMail)
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

    public function create($firstName, $lastName, $company, $address, $address2, $city, $state, $postCode, $country, $phone, $email)
    {
      $customer = new en_order_customer;
      $customer->firstName  = $firstName;
      $customer->lastName   = $lastName;
      $customer->company    = $company;
      $customer->address    = $address;
      $customer->address2   = $address2;
      $customer->city       = $city;
      $customer->state      = $state;
      $customer->postCode   = $postCode;
      $customer->country    = $country;
      $customer->phone      = $phone;
      $customer->email      = $email;
      $customer->save();

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

    public function update($customerId, $firstName, $lastName, $company, $address, $address2, $city, $state, $postCode, $country, $phone, $email)
    {
      $customer =  en_order_customer::find($customerId);
      $customer->firstName  = $firstName;
      $customer->lastName   = $lastName;
      $customer->company    = $company;
      $customer->address    = $address;
      $customer->address2   = $address2;
      $customer->city       = $city;
      $customer->state      = $state;
      $customer->postCode   = $postCode;
      $customer->country    = $country;
      $customer->phone      = $phone;
      $customer->email      = $email;
      $customer->update();
    }

}
