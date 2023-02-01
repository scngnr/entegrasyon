<?php

namespace App\Jobs\Pazaryeri\Wordpress\Product;

use Scngnr\Product\Product;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Update implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->onQueue('Product');

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
      //$this->option('magzaId') Değeri ile consoldan talep edilen Mağza güncellenir


        $productClass = new Product;
        $product      = $productClass->matches->index();
        $controller = new \Scngnr\Pazaryeri\Wordpress\Controllers\ProductController();

        for ($i=0; $i < count($product); $i++) {
          $controller->statu($product[$i]->magzaId , $product[$i]->productId);
          echo  $i . "-";
        }
    }
}
