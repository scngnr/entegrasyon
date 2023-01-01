<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class Orders extends Component
{

    public function render()
    {

        //dd(Order::where('urunBigi', 291611303)->first());
        //dd(Order::where('urunBigi', 292004076)->first());
        //dd(json_decode($ors->faturaBilgi, true));


        $orders =  Order::orderBy('siparisTarih','desc')->paginate(15);

        return view('livewire.admin.orders', ['orders' => $orders])->layout('layouts.mainLayout');
    }
}
