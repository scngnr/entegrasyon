<?php

namespace App\Http\Livewire\Product\Dashboard\Modal;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class ProductUpdate extends ModalComponent
{


    public function render()
    {
        return view('view::product.dashboard.modal.product-update');
    }
}
