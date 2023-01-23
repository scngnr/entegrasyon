<?php

namespace Scngnr\Orders;

use Illuminate\Support\ServiceProvider;

class OrdersProvider extends ServiceProvider
{
  public function register()
  {
    //
  }

  public function boot()
  {

    $this->loadMigrationsFrom(__DIR__ . '/Database/migrations');   //Database migration
    $this->loadRoutesFrom(__DIR__.'/Routes/web.php');              //Route
    $this->loadViewsFrom(__DIR__.'/views', 'view');     //Views klasörü
  }
}
