<?php

namespace App\Console\Commands\Pazaryeri\N11;

use Illuminate\Console\Command;
use Scngnr\Product\Product;

class ProductCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Pazaryeri:N11:productUpdate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Wordpress ile Eşleştirilen ürünler otomatik olarak Günceller';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $productClass = new Product;
        $product      = $productClass->matches->index();
        $controller = new \Scngnr\Pazaryeri\N11\Controllers\ProductController();

        for ($i=0; $i < 1; $i++) {
          $controller->create($product[$i]->magzaId , $product[$i]->productId);
          echo  $i . "-";
        }
    }
}
