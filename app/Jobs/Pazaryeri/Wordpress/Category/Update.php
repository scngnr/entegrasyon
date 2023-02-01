<?php

namespace App\Jobs\Pazaryeri\Wordpress\Category;

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
      $this->onQueue('Category');

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
      $category      = $productClass->category->index();
      $controller = new \Scngnr\Pazaryeri\Wordpress\Controllers\CategoryController();


      for ($i=0; $i < count($category); $i++) {
        $controller->statu(1, $category[$i]->id);
        echo $i . "-";
      }
    }
}
