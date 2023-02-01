<?php

namespace App\Console\Commands\Fatura\Parasut;

use Illuminate\Console\Command;

class conctactsUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Fatura:Parasut:contacts:update';

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
      $controller = new \Scngnr\Parasut\Http\Controllers\Product();
      $controller->index();


    }
}
