<?php

namespace App\Jobs\Pazaryeri\wordpress;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Orders implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
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
