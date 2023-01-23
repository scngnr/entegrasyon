<?php

namespace App\Http\Livewire\Product\Dashboard\Modal;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Scngnr\Product\Product;

class ProductCategory extends ModalComponent
{
  public $searchValue;
   public $pazaryeri = array();

   public function pazaryeriSearch(){

     $pazaryeri = new Product;
     $this->pazaryeri = $pazaryeri->magza->likeSearch($this->searchValue);

     
   }

    public function render()
    {

        return view('view::product.dashboard.modal.product-category');
    }
}
