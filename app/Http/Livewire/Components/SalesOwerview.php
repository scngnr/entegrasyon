<?php

namespace App\Http\Livewire\Components;

use Livewire\Component;
use App\Models\Order;
use Carbon\Carbon;

class SalesOwerview extends Component
{
    public $select = "daily";

    public function render()
    {



        return view('livewire.components.sales-owerview', [
          'ciroCount' => [],
          'saleCount' => [],
         ]);
    }
}
