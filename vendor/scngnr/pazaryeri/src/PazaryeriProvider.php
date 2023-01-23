<?php

namespace Scngnr\Pazaryeri;

use Illuminate\Support\ServiceProvider;

class PazaryeriProvider extends ServiceProvider
{
  public function register()
  {
    //
  }

  public function boot()
  {
    // 
    // $this->loadMigrationsFrom(__DIR__ . '/0Database/migrations');   //Database migration
    // $this->loadRoutesFrom(__DIR__.'/01Routes/web.php');              //Route
    // $this->loadViewsFrom(__DIR__.'/02views', 'view');     //Views klasörü
  }
}
