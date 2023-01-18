<?php

namespace Scngnr\Xmlservice;

use Illuminate\Support\ServiceProvider;

class provider extends ServiceProvider
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

    if ($this->app->runningInConsole()) {
      // Publish views
      $this->publishes([
        __DIR__.'/views' => resource_path('views/vendor/Xmlservice'),
      ], 'views');
    }
  }
}
