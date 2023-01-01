<?php

namespace App\Http\Livewire\Admin\Pazaryeri\Trendyol;

use Livewire\Component;
use App\Models\Order;

class OrderDetail extends Component
{
    public $orderId ;

    public function Mount($id){
      $this->orderId = $id;
    }
    public function render()
    {
        $order = Order::find($this->orderId);
        $customerOrderHistories = Order::where('customerName', $order->customerName)->get();
        // dd($customerOrderHistories);
        return view('livewire.admin.pazaryeri.trendyol.order-detail', ['order' => $order, 'customerOrderHistories' => $customerOrderHistories] )->layout('layouts.mainLayout');
    }
}
