<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Jobs\Pazaryeri\Wordpress\Category\Update as categoryUpdate;
use App\Jobs\Pazaryeri\Wordpress\Product\Update as productUpdate;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */

     protected $commands = [
       Commands\ordersCheck::class,
       Commands\xmlService::class,
     ];

    protected function schedule(Schedule $schedule)
    {
      // for ($i=1; $i < 4; $i++) {
      //    //$schedule->command("Pazaryeri:wordpress:categoryUpdate --magzaId=$i")->everyMinute();
      // }

      categoryUpdate::dispatch();
      productUpdate::dispatch();

      // $schedule->command('xml:productCheck')->hourly();
      // $schedule->command('trendyol:productUpdate')->hourly();
      // $schedule->command('hepsiBurada:eslesenUrunGuncelle')->hourly();



    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
