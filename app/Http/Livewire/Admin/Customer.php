<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;

class Customer extends Component
{
    public function render()
    {
        $allCustomer = Order::paginate(25);

        return view('livewire.admin.customer', ['allCustomer' => $allCustomer])->layout('layouts.mainLayout');
    }
}
