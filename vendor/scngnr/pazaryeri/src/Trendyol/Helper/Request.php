<?php

namespace Scngnr\Pazaryeri\Wordpress\Helper;

use Carbon\Carbon;
use GuzzleHttp\Client;

use Illuminate\Support\Facades\Http;
use \Datetime;

Class Request {

        /**
      *
      * Binance Api Url
      * @var string
      *
      */
      public  $baseUrl = "https://fapi.binance.com/fapi/";
      public $apiUrl;

      /**
       *
       * Binance ApiKey
       * @var string
       *
       */
      protected $apiKey;

      /**
       *
       * Binance apiSecret
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
      public function getResponse(array $params , $apiUrl, $method, )
      {
        $url = $this->baseUrl . $apiUrl ;

        $client = new Client();
        try {

        } catch (\Exception $e) {

        }
        $response = $client->request($method, $url, [
          'headers' => [
              'Content-Type'    => 'application/json',
              'X-MBX-APIKEY'   => 's3hC1Q42zD2FYFWFApguzTMrgaJRz6db5i2B8uMvZPVsWb1oNgbSTKa7aYtdlZT6',
          ],
            ]);

        $body = json_decode($response->getBody()->getContents(),true);
          return $body;
      }
}
