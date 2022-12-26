<?php

namespace Scngnr\Mdent\Binance;
use Scngnr\Mdent\Binance\Helper\Gateway;

Class BinanceClient extends Gateway {

  /**
	 *
	 * @description N11 Api Key
	 * @param string $apiKey
	 *
	 */
	 public $apiKey;

	 public $apiSecret;

	 public function __construct($apiKey,$apiSecret)
	 {

		 		$this->apiKey = $apiKey;
				$this->apiSecret = $apiSecret;
	 }

}
