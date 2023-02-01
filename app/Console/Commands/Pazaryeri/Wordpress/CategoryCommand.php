<?php

namespace App\Console\Commands\Pazaryeri\Wordpress;

use Illuminate\Console\Command;
use Scngnr\Product\Product;

class CategoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Pazaryeri:wordpress:categoryUpdate {--magzaId=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Wordpress Kategorileri otomatik olarak Günceller';

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
        //$this->option('magzaId') Değeri ile consoldan talep edilen Mağza güncellenir
        $productClass = new Product;
        $category      = $productClass->category->index();
        $controller = new \Scngnr\Pazaryeri\Wordpress\Controllers\CategoryController();


        for ($i=0; $i < count($category); $i++) {
          $controller->statu($this->option('magzaId') , $category[$i]->id);
          echo $i . "-";
        }
    }
}
