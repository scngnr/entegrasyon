<?php

namespace Scngnr\Parasut\Services;

use Scngnr\Parasut\Exception;
use Scngnr\Parasut\Request;


class salesInvoice extends Request
{
  public $baseEndPoint = "https://api.parasut.com/v4/38340";
  public $apiurl = "purchase_bills" ;

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

  public function createBasicPurchaseBill($array){

    $this->getResponse($access_token, 'POST', $this->baseEndPoint . '#basic', $array);
  }

  /**
  *
  *  @version Master -- BetaTest
  *  @author Sercan güngör
  */

  public function createDetailedPurchaseBill($array){

    $this->getResponse($access_token, 'POST', $this->baseEndPoint . '#detailed', $array);
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

    public function delete($id){

      $this->getResponse($access_token, 'DELETE', $this->baseEndPoint. '/'. $id);
    }

    /**
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function createBasicPurchaseBill($array){

      $this->getResponse($access_token, 'PUT', $this->baseEndPoint . '#basic', $array);
    }


    /**
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function editDetailedPurchaseBill($array){

      $this->getResponse($access_token, 'PUT', $this->baseEndPoint . '#detailed', $array);
    }


    /**
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function pay($id, $array){

      $this->getResponse($access_token, 'POST', $this->baseEndPoint. '/'. $id. '/' . 'payments', $array);
    }

    /**
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function cancel($id){

      $this->getResponse($access_token, 'DELETE', $this->baseEndPoint. '/'. $id. '/' . 'cancel');
    }

    /**
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function recover($id){

      $this->getResponse($access_token, 'PATCH', $this->baseEndPoint. '/'. $id. '/' . 'recover');
    }

    /**
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function archive($id){

      $this->getResponse($access_token, 'PATCH', $this->baseEndPoint. '/'. $id. '/' . 'archive');
    }

    /**
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function unArchive($id){

      $this->getResponse($access_token, 'PATCH', $this->baseEndPoint. '/'. $id. '/' . 'unarchive');
    }
}
