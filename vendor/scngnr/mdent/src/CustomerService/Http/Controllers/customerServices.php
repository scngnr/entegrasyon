<?php

namespace Scngnr\Mdent\CustomerService\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use Illuminate\Http\Request;
use Automattic\WooCommerce\Client;
use Illuminate\Routing\Controller;
use Scngnr\Mdent\PriceService\Models\priceService;
use Illuminate\Support\Facades\Http;
use Scngnr\Mdent\CustomerService\Models\CustomerService;

class customerServices extends Controller
{

  public function create(){

    $orders = Order::all();

    for ($i=0; $i < count($orders); $i++) {

      if($orders[$i]->pazaryeri == 'N11'){
        $orderDetail = json_decode($orders[$i]->faturaBilgi, 1);
        $orderDetail = $orderDetail['orderDetail'];

        if(CustomerService::where('adi', $orderDetail['billingAddress']['fullName'])->first()){

        }else {

          $customer = new CustomerService;
          $customer->adi = $orderDetail['billingAddress']['fullName'];
          $customer->email = $orderDetail['buyer']['email'];
          $customer->telefonNo = $orderDetail['billingAddress']['gsm'];
          $customer->gonderimAdresi	 = $orderDetail['buyer']['tcId'];
          $customer->faturaAdresi = $orderDetail['billingAddress']['address'];
          $customer->tc = $orderDetail['buyer']['tcId'];
          $customer->vergiNo = $orderDetail['buyer']['taxId'];
          $customer->vergiDairesi = $orderDetail['buyer']['taxOffice'];
          $customer->city = $orderDetail['billingAddress']['address'];
          $customer->district = $orderDetail['billingAddress']['district'];
          $customer->save();
        }
      }
    }
  }

  public function parasutCustomerCreate(){

    $databaseCustomer = CustomerService::all();
    $musteriController = new \Scngnr\Mdent\FaturaEnt\Parasut\Http\Controllers\MusteriTedarikci();

    for ($i=0; $i < count($databaseCustomer) ; $i++) {

    if($databaseCustomer[$i]->parasut == NULL){
      $data = [
        'data' => [
          'id' => 1,
          'type' => 'contacts',
          'attributes' => [
            'email' => $databaseCustomer[$i]['email'],
            'name' => $databaseCustomer[$i]['adi'],
            //'short_name' => $databaseCustomer[$i]['adi'],
            'contact_type' => "company",
            'tax_office' => $databaseCustomer[$i]['vergiDairesi'],
            'tax_number' => $databaseCustomer[$i]['vergiNo'],
            'district' => $databaseCustomer[$i]['district'],
            'city' => $databaseCustomer[$i]['city'],
            'country' => "turkiye",
            'address' => $databaseCustomer[$i]['faturaAdresi'],
            'phone' => $databaseCustomer[$i]['telefonNo'],
            //'fax' => $databaseCustomer[''],
            'is_abroad' => false,
            'archived' => false,
            //'iban' => $databaseCustomer[''],
            'account_type' => "customer",
            'untrackable' => false,
          ]
        ]
      ];

      $response = $musteriController->create($data);

      $updateDatabaseCustomer = customerservice::find($databaseCustomer[$i]->id);
      $updateDatabaseCustomer->parasut = json_encode($response);
      $updateDatabaseCustomer->update();
    }
    }
  }
}
