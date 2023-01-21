<?php

namespace Scngnr\Product\Services;

use Scngnr\Product\Helper\exception;

Class category {


  /**
  * Varyasyonu bulunan Tüm Ürünleri Listele
  *
  *  @param bool $paginate --Default False
  *  @param int $paginate   --Value
  *  @version Master -- BetaTest
  *  @author Sercan güngör
  */

  public function index($paginate = FALSE, $paginateValue = 0)
  {
    if($paginate){
      return en_product::all()->paginate($paginateValue);
    }else {
      return en_product::all();
    }
  }

  /**
  * Varyasyonu bulunan Tüm Ürünleri Listele
  *
  *
  * @version Master -- BetaTest
  * @author Sercan Güngör
  */

  public function create($stokCode , $spect, $source){

  }

  /**
  * Varyasyonu bulunan Tüm Ürünleri Listele
  *
  *
  * @version Master -- BetaTest
  * @author Sercan Güngör
  */

  public function update($productId, $spect){

  }

  /**
  * Varyasyonu bulunan Tüm Ürünleri Listele
  *
  *
  * @version Master -- BetaTest
  * @author Sercan Güngör
  */

  public function delete($productId){

  }
}
