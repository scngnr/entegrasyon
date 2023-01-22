<?php

namespace App\Http\Livewire\Product\Dashboard\Modal;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Scngnr\Product\Product;

class ProductStatu extends ModalComponent
{
  public $productId, $statu;

  public function Mount($productId){
    $this->productId = $productId;
  }
  public function update(){
    $product = new Product;
    
    if(is_array($this->productId)){
      for ($i=0; $i < count($this->productId); $i++) {
        $product->product->status($this->productId[$i], $this->statu);
      }
    }else {
      $product->product->status($this->productId, $this->statu);
    }
  }

    public function render()
    {
        return view('view::product.dashboard.modal.product-statu');
    }
}
