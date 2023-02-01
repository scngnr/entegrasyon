<?php

namespace Scngnr\Parasut\Services;

use Scngnr\Parasut\Helper\Exception;
use Scngnr\Parasut\Helper\Request;


class contacts extends Request
{
  public $firmaId = "348340/";
  public $apiurl = "contacts" ;
  public $baseEndPoint = "https://api.parasut.com/v4/";

  public $access_token = "Zir7DDllRNBecNRowW_eyz-Moz9CGutoK15TWTtlQXE";

  /**
  *
  *  @version Master -- BetaTest
  *  @author Sercan güngör
  */

  public function index(){

    $this->getResponse($this->access_token, 'GET', $this->baseEndPoint . $this->firmaId . $this->apiurl);
  }

  /**
  *
  *  @version Master -- BetaTest
  *  @author Sercan güngör
  */

  public function create($array){

    return $this->getResponse($this->access_token, 'POST', $this->baseEndPoint . $this->firmaId . $this->apiurl, $array);
  }

  /**
  *
  *  @version Master -- BetaTest
  *  @author Sercan güngör
  */

  public function Show($id){

    $this->getResponse($this->access_token, 'GET', $this->baseEndPoint . $this->firmaId . $this->apiurl. '/'. $id);
  }

  /**
  *
  *  @version Master -- BetaTest
  *  @author Sercan güngör
  */

  public function edit($id, $array){

    $this->getResponse($this->access_token, 'PUT', $this->baseEndPoint . $this->firmaId . $this->apiurl. '/'. $id, $array);
  }

    /**
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function delete($id){

      $this->getResponse($this->access_token, 'DELETE', $this->baseEndPoint . $this->firmaId . $this->apiurl. '/'. $id);
    }

    /**
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function tahsilat($id, $array){

      $this->getResponse($this->access_token, 'POST', $this->baseEndPoint . $this->firmaId . $this->apiurl. '/'. $id. '/' . 'contact_debit_transactions', $array);
    }

    /**
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function odeme($id, $array){

      $this->getResponse($this->access_token, 'POST', $this->baseEndPoint . $this->firmaId . $this->apiurl. '/'. $id. '/' . 'contact_credit_transactions', $array);
    }

}
