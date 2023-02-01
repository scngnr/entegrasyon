<?php

namespace App\Console\Commands\Fatura\Parasut;

use Illuminate\Console\Command;
use Scngnr\Product\Product;

class productUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Fatura:Parasut:product:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '';

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
      $products = $productClass->product->index();

      for ($i=0; $i < count($products); $i++) {

        $controller = new \Scngnr\Parasut\Http\Controllers\ProductController();
        $controller->statu($products[$i]->id);
        sleep(1.5);
      }
    }
}
