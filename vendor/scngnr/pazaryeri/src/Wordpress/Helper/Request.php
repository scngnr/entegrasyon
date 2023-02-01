<?php

namespace Scngnr\Pazaryeri\Wordpress\Helper;

use Carbon\Carbon;
use Automattic\WooCommerce\Client;

Class Request {

      /**
       *
       * @return array
       *
       */

      public function getResponse(
        $magzaUrl,
        $magzaApiKey,
        $magzaSecretKey,
        $method,
        $apiUrl,
        $data = array()){

        // $woocommerce = new Client(
        //   'https://gnrstill.com/',
        //   'ck_051352650428b8a02b6a4c77089f8e9713f31f48',
        //   'cs_d883e0c69cbb602c9e78335488060ee802cf6ff8',
        //   [
        //     'version' => 'wc/v3',
        //   ]
        // );
        // $response = $woocommerce->post('products', $data);

        $woocommerce = new Client( "$magzaUrl", $magzaApiKey, "$magzaSecretKey",
        [
          'version' => 'wc/v3',
        ]
      );


        $response = $woocommerce->$method($apiUrl, $data);
        return $response;
      }
}
