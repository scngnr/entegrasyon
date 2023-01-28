<?php

namespace Scngnr\Pazaryeri\Wordpress;
use Scngnr\Pazaryeri\Wordpress\Helper\Gateway;

class Service extends Gateway
{

  public function setApiKey($key){
    $this->apiKey = $key;
  }

  public function setApiSecret($key){
    $this->apiSecret = $key;
  }

  public function setApiKeyValue(){
    return  $this->apiKey;
  }

  public function setApiSecretValue(){
    return  $this->apiSecret;
  }
}
