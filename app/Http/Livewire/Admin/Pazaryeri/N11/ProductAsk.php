<?php

namespace App\Http\Livewire\Admin\Pazaryeri\N11;

use Carbon\Carbon;
use Livewire\Component;
use IS\PazarYeri\N11\N11Client;

class ProductAsk extends Component
{
    public function render()
    {
      $client = new N11Client();
      $client->setApiKey('801d611a-58df-441a-b146-468d624bf145');
      $client->setApiPassword('QQUm3FV27f0U0JGI');

        //dd($client->product->getProductBySellerCode('led01'));
        $product = array(
            'productId' => '',
            'buyerEmail' => '',
            'subject' => '',
            'startDate' => Carbon::now()->subDays(30)->format('d/m/Y'),
            'endDate' => Carbon::now()->subDays(15)->format('d/m/Y'),
            'status' => '',
            'questionDate' => ''
          );

          dd(json_decode(json_encode($client->product->GetProductQuestionList($product, array('currentPage' => 0, 'pageSize' => 100))), true));

        return view('livewire.admin.pazaryeri.n11.product-ask')->layout('layouts.mainLayout');
    }
}
