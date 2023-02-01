<?php

namespace Scngnr\Orders\Http\Controllers;

use Illuminate\Routing\Controller;
use Scngnr\Pazaryeri\Wordpress\Service;

Class WoocommerceOrders extends Controller{

      /**
      *
      *
      *
      *  @version Master -- BetaTest
      *  @author Sercan güngör
      */

    public function index()
    {
      $wordpressClass = new Service;
      $wordpressClass->order->index();
      
    }


    /**
    *
    *
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function retrieve()
    {

     }

    /**
    *
    *
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function create()
    {

    }

    /**
    *
    *
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function update()
    {

    }

    /**
    *
    *
    *
    *  @version Master -- BetaTest
    *  @author Sercan güngör
    */

    public function delete()
    {

    }
}
