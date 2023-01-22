<?php

namespace App\Http\Livewire\Product\Dashboard\Modal;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Scngnr\Product\Product;

class ProductStatu extends ModalComponent
{
  public $produtId, $statu;

  public function Mount($productId){
    $this->productId = $productId;
  }
  public function update(){
    $product = new Product;
    $product->product->status($this->productId, $this->statu);
  }
    public function render()
    {
        return view('view::product.dashboard.modal.product-statu');
    }
}
