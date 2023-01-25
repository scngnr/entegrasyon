<?php

namespace Scngnr\Pazaryeri\Wordpress;
use Scngnr\Pazaryeri\Wordpress\Helper\Gateway;

class Service extends Gateway
{


  /**
  *
  *
  *   @version Master -- BetaTest
  *   @author Sercan Güngör
  */

  public function setApiKey($key){
    $this->apikey = $key;
  }

  /**
  *
  *
  *   @version Master -- BetaTest
  *   @author Sercan Güngör
  */


  public function setApiSecret($secret){
    $this->apiSecret = $secret;
  }
}
