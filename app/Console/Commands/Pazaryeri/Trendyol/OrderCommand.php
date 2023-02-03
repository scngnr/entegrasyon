<?php

namespace App\Console\Commands\Pazaryeri\Trendyol;

use Illuminate\Console\Command;
use Scngnr\Product\Product;

class OrderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Pazaryeri:Trendyol:orders';

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
        $controller = new \Scngnr\Pazaryeri\Wordpress\Controllers\OrdersController();
        $controller->order(1);

        $controller->orderDetail(1);

        $controller->orderDetailItem(1);

        $controller->orderCustomer(1);
    }
}
