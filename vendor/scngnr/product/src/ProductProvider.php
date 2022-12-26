<?php

namespace Scngnr\Product;

use Illuminate\Support\ServiceProvider;

class ProductProvider extends ServiceProvider
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
