<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Scngnr\Orders\Models\Order;


class Siparis extends Component
{

    public function render()
    {

        $orders =  Order::orderBy('siparisTarih','desc')->paginate(15);

        return view('view::orders', ['orders' => $orders])->layout('layouts.mainLayout');
    }
}
