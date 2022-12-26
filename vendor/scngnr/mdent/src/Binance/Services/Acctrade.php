<?php

namespace Scngnr\Mdent\Binance\Services;

use Scngnr\Mdent\Binance\Helper\Bnexception;
use Scngnr\Mdent\Binance\Helper\Request;
use App\Models\Cryptoorder;

Class Acctrade extends Request {

      /**
      *
      * Apide kullanılacak bilgiler
      * api Yolu
      *@param string $api
      * api Versiyonu
      * @param string $version
      */
      /**
     *
     * Request sınıfı için gerekli ayarların yapılması
     *
     * @author Sercan güngör
     *
     */
    public function __construct( $apiKey, $apiSecret)
    {

      $this->apiKey = $apiKey;
      $this->apiSecret = $apiSecret ;
    }

    /*
    *Connect Test
    *Bağlantı testi için kullanılabilir.
    *
    *
    */
    public function connectTest ( $method = 'GET'){

      $apiUrl = "v1/ping";
      return $this->getResponse($apiUrl);
    }

    /*
    *marketPrice
    *Binance USD@-M vadeli marketindeki tüm coinlerin
    * bilgilerini döndürür
    *
    */

    public function marketPrice (){
      $params = array(
        'recvWindow' => 60000
      );

      $apiUrl = "v1/premiumIndex";
      return $this->getResponse($params , $apiUrl, $method = 'GET');
    }

    /*
    *
    *checkServerTime()
    * Binance Sunucu saatini döndürür
    */
    public function checkServerTime (){

      $apiUrl = "v1/time";
      return $this->getResponse($apiUrl, $method = 'GET');
    }

    /**
    *
    * @function Order()
    *
    * USDM@-M piyasasında Long veya Short pozisyon açmak için kullanılması
    *gereken methoddur.
    *
    * @param symbol      = Sembol MARKET adi
    * @param side        = Long OR SHORT
    * @param type        = Market or LIMIT
    * @param qty         = Alınacak Coin miktarıdır.
    * @param recvWindow  = Api isteği sırasına oluşan geçikmeyi asborve etmek için kullanılır
    * @param signature   = Url üzerinde signature eklenmesi gerekiyor ise TRUE olarak gönderilmelidir.
    */

    public function order ($symbol, $side, $type, $qty ){

      $params = array(
        'symbol' => $symbol,
        'side' => $side,
        'type' => $type,
        'quantity' => $qty,
        'recvWindow' => 60000
      );


      $apiUrl = "v1/order";
      $response = $this->getResponse($params , $apiUrl, $method = 'POST', $signature = TRUE );
      // Pozisyon veritabanına kayıt ediliyor.

      $crypto = new Cryptoorder;
      $crypto->orderId          =  $response['orderId'] ;
      $crypto->symbol           =  $response['symbol'] ;
      $crypto->status           =  $response['status'] ;
      $crypto->clientOrderId    =  $response['clientOrderId'] ;
      $crypto->price            =  $response['price'] ;
      $crypto->avgPrice         =  $response['avgPrice'] ;
      $crypto->origQty          =  $response['origQty'] ;
      $crypto->executedQty      =  $response['executedQty'] ;
      $crypto->cumQty           =  $response['cumQty'] ;
      $crypto->cumQuote         =  $response['cumQuote'] ;
      $crypto->timeInForce      =  $response['timeInForce'] ;
      $crypto->type             =  $response['type'] ;
      $crypto->reduceOnly       =  $response['reduceOnly'] ;
      $crypto->closePosition    =  $response['closePosition'] ;
      $crypto->side             =  $response['side'] ;
      $crypto->positionSide     =  $response['positionSide'] ;
      $crypto->stopPrice        =  $response['stopPrice'] ;
      $crypto->workingType      =  $response['workingType'] ;
      $crypto->priceProtect     =  $response['priceProtect'] ;
      $crypto->origType         =  $response['origType'] ;

      $crypto->save();
      return $response;
    }

    /*
    *
    *
    *
    *
    */

    public function openOrder($symbol,$orderId){

      $params = array(
        'symbol' => $symbol,
        'orderId' => $orderId,
        'recvWindow' => 60000
      );

      $apiUrl = "v1/order";
      return $this->getResponse( $params, $apiUrl, $method = 'GET' , FaLSE);
    }
    /*
    *
    *
    *
    *
    */

    public function accountBalance (){
      $params = array(
        'recvWindow' => 60000
      );

      $apiUrl = "v2/account";
      return $this->getResponse( $params, $apiUrl, $method = 'get' , FALSE);
    }

    /*
    *
    *
    *
    *
    */

    public function userTrades  (){
      $params = array(
        'symbol' => 'APEUSDT' ,
        'recvWindow' => 60000
      );

      $apiUrl = "v1/userTrades";
      return $this->getResponse( $params, $apiUrl, $method = 'get' , FALSE);
    }

    /*
    *
    *
    *
    *
    */

    public function positionRisk  (){
      $params = array(
        'symbol' => 'APEUSDT' ,
        'recvWindow' => 60000
      );

      $apiUrl = "v2/positionRisk";
      return $this->getResponse( $params, $apiUrl, $method = 'get' , FALSE);
    }
}
