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

    $this->loadMigrationsFrom(__DIR__ . 'Wordpress/Database/migrations');   //Database migration
    // $this->loadRoutesFrom(__DIR__.'Wordpress/Routes/web.php');              //Route
    // $this->loadViewsFrom(__DIR__.'Wordpress/views', 'view');     //Views klasörü
  }
}
