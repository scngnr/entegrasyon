<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Scngnr\Orders\Models\Order;


class Orders extends Component
{

    public function render()
    {

        $orders =  Order::orderBy('siparisTarih','desc')->paginate(15);

        return view('view::dashboard', ['orders' => $orders])->layout('layouts.mainLayout');
    }
}
