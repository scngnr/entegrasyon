<?php

namespace Scngnr\Parasut\Services;

use Scngnr\Parasut\Helper\Exception;
use Scngnr\Parasut\Helper\Request;


class products extends Request
{
  public $firmaId = "348340/";
  public $apiurl = "products" ;
  public $baseEndPoint = "https://api.parasut.com/v4/";
  
    /**
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function index(){


      return $this->getResponse('Cbv3-qkt01Y_ncWVUZW1mX8HGN-ujPhWmLE4h0OhZAs' , 'GET', $this->baseEndPoint . $this->firmaId . $this->apiurl, array());
    }

    /**
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function create($array){

      $this->getResponse($access_token, 'POST', $this->baseEndPoint . $this->firmaId . $this->apiurl, $array);
    }

    /**
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function Show($id){

      $this->getResponse($access_token, 'GET', $this->baseEndPoint . $this->firmaId . $this->apiurl. '/'. $id);
    }

    /**
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function edit($id, $array){

      $this->getResponse($access_token, 'PUT', $this->baseEndPoint . $this->firmaId . $this->apiurl. '/'. $id, $array);
    }

      /**
      *
      *  @version Master -- BetaTest
      *  @author Sercan güngör
      */

      public function delete($id){

        $this->getResponse($access_token, 'DELETE', $this->baseEndPoint . $this->firmaId . $this->apiurl. '/'. $id);
      }
}
