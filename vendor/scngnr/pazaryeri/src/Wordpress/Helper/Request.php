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
        $data ){

        // $woocommerce = new Client(
        //     $magzaUrl,
        //     $magzaApiKey,
        //     $magzaSecretKey,
        //     [
        //       'version' => 'wc/v3',
        //     ]
        // );
        $woocommerce = new Client( "$magzaUrl", $magzaApiKey, "$magzaSecretKey",
        [
          'version' => 'wc/v3',
        ]
      );
        $response = $woocommerce->$method($apiUrl, $data);
        return $response;
      }
}
