<?php

namespace Scngnr\Parasut\Services;

use Scngnr\Parasut\Exception;
use Scngnr\Parasut\Request;


class salesInvoice extends Request
{
  public $baseEndPoint = "https://api.parasut.com/v4/38340";
  public $apiurl = "product" ;


  public $access_token  ;

  public function __construct(){

    $controller = new \Scngnr\Parasut\Http\Controllers\Auth();
    $this->access_token = $controller->accesToken();
  }

    $this->baseEndPoint = "{$this->baseEndPoint}/{$this->apiurl}";
    /**
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function index($id){

      $this->getResponse($access_token, 'GET', $this->baseEndPoint . '/' . $id . 'inventory_levels');
    }
}
