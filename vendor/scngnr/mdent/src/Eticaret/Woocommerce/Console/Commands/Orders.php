<?php

namespace Scngnr\Mdent\Woocommerce\Console\Commands;

use Automattic\WooCommerce\Client;
use Illuminate\Console\Command;

class Orders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'wc:ordersCheck';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Woocommerce Siparişlerini çek';

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

      $woocommerce = new Client(
        'http://localhost/projeler/wordpress/',
        'ck_b6056d6ae364654d91953bd3a22cd24db8455948',
        'cs_c801c41f27f65c788b9cad7dddbe5bd8bcb1d16b',
        [
          'version' => 'wc/v3',
        ]
          );

          $data = [
        'email' => 'john.doe@example.com',
        'first_name' => 'John',
        'last_name' => 'Doe',
        'username' => 'john.doe',
        'billing' => [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'company' => '',
            'address_1' => '969 Market',
            'address_2' => '',
            'city' => 'San Francisco',
            'state' => 'CA',
            'postcode' => '94103',
            'country' => 'US',
            'email' => 'john.doe@example.com',
            'phone' => '(555) 555-5555'
        ],
        'shipping' => [
            'first_name' => 'John',
            'last_name' => 'Doe',
            'company' => '',
            'address_1' => '969 Market',
            'address_2' => '',
            'city' => 'San Francisco',
            'state' => 'CA',
            'postcode' => '94103',
            'country' => 'US'
        ]
    ];

    print_r($woocommerce->post('customers', $data));
    }
}
