<?php

namespace Scngnr\Pazaryeri\Wordpress\Helper;

use Carbon\Carbon;
use GuzzleHttp\Client;

use Illuminate\Support\Facades\Http;
use \Datetime;

Class Request {

        /**
      *
      *
      * @var string
      *
      */
      public  $baseUrl = "https://fapi.binance.com/fapi/";
      public $apiUrl;

      /**
       *
       *
       * @var string
       *
       */
      protected $apiKey;

      /**
       *
       * B
       * @var string
       *
       */
      protected $apiSecret;

      /**
       *
       * Hazırlanan isteği apiye iletir ve yanıtı json olarak döner.
       *
       * @author Sercan Güngör
       * @param array $query
       * @param array $data
       * @param boolean $authorization
       * @return array
       *
       */
      public function getResponse( $apiUrl, $method, $data )
      {

        $woocommerce = new Client(
            'http://scngnrtest.infinityfreeapp.com/',
            'ck_3890365a7b810a9e26a02b4ffd7757da53cb49e9',
            'cs_bcc21877f10b1f25b59fce1446674b02f75b020a',
            [
              'version' => 'wc/v3',
            ]
        );
        $response = $woocommerce->post($apiUrl, $data);
      }
}
