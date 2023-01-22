<?php

namespace App\Http\Livewire\Product\Dashboard\Modal;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Scngnr\Product\Product;

class ProductSellerAccountAdd extends ModalComponent
{
  public $productId, $searchValue, $magzaId, $fiyat, $islem, $formul;
   public $pazaryeri = array();

   public function pazaryeriSearch(){

     $pazaryeri = new Product;
     $this->pazaryeri = $pazaryeri->magza->likeSearch($this->searchValue);
   }

    public function pazaryeriPriceAdd(){
      if(is_array($this->productId)){
        for ($i=0; $i < count($this->productId); $i++) {
          $pFId = new Product;
          $pFId->magzaPrice->create($this->productId[$i], $this->searchValue, $this->magzaId, $this->fiyat);
        }
      }else {
        $pFId = new Product;
        $pFId->magzaPrice->create($this->productId, $this->searchValue, $this->magzaId, $this->fiyat);
      }
    }
    public function render()
    {
        return view('view::product.dashboard.modal.product-seller-account-add');
    }
}
