<?php

namespace Scngnr\Mdent;

use Illuminate\Support\ServiceProvider;

class Scngnrproviders extends ServiceProvider
{
  public function register()
  {
    //
  }

  public function boot()
  {

    /*
    *
    *-------------------------------------------------------------------------
    *                          Woocommerce
    *-------------------------------------------------------------------------
    *
    */

     $this->loadRoutesFrom(__DIR__.'/Eticaret/Woocommerce/routes/web.php'); //Route

     /*
     *
     *-------------------------------------------------------------------------
     *                          Price Serice
     *-------------------------------------------------------------------------
     *
     */
     $this->loadMigrationsFrom(__DIR__ . '/PriceService/Database/migrations');   //Database migration
     $this->loadRoutesFrom(__DIR__.'/PriceService/Routes/web.php');              //Route
     $this->loadViewsFrom(__DIR__.'/PriceService/views', 'priceService');

     /*
     *
     *-------------------------------------------------------------------------
     *                         Xml Entegrasyon
     *-------------------------------------------------------------------------
     *
     */
     $this->loadMigrationsFrom(__DIR__ . '/Xmlentegrasyon/Database/migrations');   //Database migration
     $this->loadRoutesFrom(__DIR__.'/Xmlentegrasyon/Routes/web.php');              //Route
     $this->loadViewsFrom(__DIR__.'/Xmlentegrasyon/views', 'priceService');

     /*
     *
     *-------------------------------------------------------------------------
     *                         Parasut Entegrasyon
     *-------------------------------------------------------------------------
     *
     */
     // $this->loadMigrationsFrom(__DIR__ . '/FaturaEnt/Parasut/Database/migrations');   //Database migration
     $this->loadRoutesFrom(__DIR__.'/FaturaEnt/Parasut/Routes/web.php');              //Route
     $this->loadViewsFrom(__DIR__.'/FaturaEnt/Parasut/views', 'priceService');

     /*
     *
     *-------------------------------------------------------------------------
     *                         Category Service
     *-------------------------------------------------------------------------
     *
     */
     $this->loadMigrationsFrom(__DIR__ . '/CategoryService/Database/migrations');   //Database migration
     $this->loadRoutesFrom(__DIR__.'/CategoryService/Routes/web.php');              //Route
     $this->loadViewsFrom(__DIR__.'/CategoryService/views', 'priceService');

     /*
     *
     *-------------------------------------------------------------------------
     *                         ProductService Service
     *-------------------------------------------------------------------------
     *
     */
     $this->loadMigrationsFrom(__DIR__ . '/ProductService/Database/migrations');   //Database migration
     $this->loadRoutesFrom(__DIR__.'/ProductService/Routes/web.php');              //Route
     $this->loadViewsFrom(__DIR__.'/ProductService/views', 'priceService');

     /*
     *
     *-------------------------------------------------------------------------
     *                         Invoice Service
     *-------------------------------------------------------------------------
     *
     */
     $this->loadMigrationsFrom(__DIR__ . '/FaturaEnt/InvoiceService/Database/migrations');   //Database migration
     $this->loadRoutesFrom(__DIR__.'/FaturaEnt/InvoiceService/Routes/web.php');              //Route
     $this->loadViewsFrom(__DIR__.'/FaturaEnt/InvoiceService/views', 'priceService');


     /*
     *
     *-------------------------------------------------------------------------
     *                         Customer Service
     *-------------------------------------------------------------------------
     *
     */
     $this->loadMigrationsFrom(__DIR__ . '/CustomerService/Database/migrations');   //Database migration
     $this->loadRoutesFrom(__DIR__.'/CustomerService/Routes/web.php');              //Route
     $this->loadViewsFrom(__DIR__.'/CustomerService/views', 'priceService');

  }
}
