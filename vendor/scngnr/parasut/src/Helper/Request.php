<?php

namespace Scngnr\Parasut\Helper;

use Illuminate\Support\Facades\Http;

Class Request {

      /**
       *
       * @return array
       *
       */

      public function getResponse(
        $access_token = "Cbv3-qkt01Y_ncWVUZW1mX8HGN-ujPhWmLE4h0OhZAs",
        $method,
        $apiUrl,
        $data = array()){

          $response = Http::withHeaders(
            [
              'Accept' => 'application/json',
              'Authorization' => 'Bearer '.$access_token,
            ])->$method($apiUrl, $data);
            dd($response->json());
            return $response->json();
      }
}
