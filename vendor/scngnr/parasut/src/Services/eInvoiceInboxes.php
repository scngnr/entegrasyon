<?php

namespace Scngnr\Parasut\Services;

use Scngnr\Parasut\Exception;
use Scngnr\Parasut\Request;


class salesInvoice extends Request
{
  public $baseEndPoint = "https://api.parasut.com/v4/38340";
  public $apiurl = "e_invoice_inboxes" ;

    $this->baseEndPoint = "{$this->baseEndPoint}/{$this->apiurl}";
    /**
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function index(){

      $this->getResponse($access_token, 'GET', $this->baseEndPoint);
    }
}
