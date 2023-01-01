<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Order;
use Carbon\Carbon;

class Dashboard extends Component
{

    public function render()
    {

      //$totalSalesAmount =
        return view('livewire.admin.dashboard', [
          'todayInOrders'           => 0,
          'thisMontSalesAmount'     => 0 ,
          'lastMonthSalesAmount'    => 0 ,
          'thisMontSalesCount'      => 0,
          'lastMonthSalesCount'     => 0,

          'salesYuzdeFark'          => 0,
          'adetYuzdeFark'           => 0,
          ])->layout('layouts.mainLayout');
    }













}
