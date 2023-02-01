<?php

namespace Scngnr\Parasut\Services;

use Scngnr\Parasut\Exception;
use Scngnr\Parasut\Request;


class salesInvoice extends Request
{
  public $baseEndPoint = "https://api.parasut.com/v4/38340";
  public $apiurl = "tags" ;

    $this->baseEndPoint = "{$this->baseEndPoint}/{$this->apiurl}";
    /**
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function index(){

      $this->getResponse($access_token, 'GET', $this->baseEndPoint);
    }

    /**
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function create($array){

      $this->getResponse($access_token, 'POST', $this->baseEndPoint, $array);
    }

    /**
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function Show($id){

      $this->getResponse($access_token, 'GET', $this->baseEndPoint. '/'. $id);
    }

    /**
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function edit($id, $array){

      $this->getResponse($access_token, 'PUT', $this->baseEndPoint. '/'. $id, $array);
    }

      /**
      *
      *  @version Master -- BetaTest
      *  @author Sercan güngör
      */

      public function delete($id){

        $this->getResponse($access_token, 'DELETE', $this->baseEndPoint. '/'. $id);
      }
}
