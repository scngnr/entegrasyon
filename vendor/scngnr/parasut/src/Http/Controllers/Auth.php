<?php

namespace Scngnr\Parasut\Http\Controllers;

use Illuminate\Http\Request;
use Automattic\WooCommerce\Client;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Http;
use Scngnr\Parasut\Models\en_parasut_magza_info;
use Scngnr\Parasut\Helper\apiData;
use Carbon\Carbon;

class Auth extends Controller
{
  use apiData;

  // Parasut sisteminde kayıtlı tüm kategorileri döndürür.
  // public function oAuthToken2(){
  //
  //
  //   $response = Http::asForm()->post('https://api.parasut.com/oauth/token', [
  //       'grant_type' => 'password',
  //       'access_token_url' => 'https://api.parasut.com/oauth/token',
  //       'client_id' => 'uDKy9IMfoNWxHbxgNbsOif4sjZTOcedT5B9FVb-5l5I',
  //       'client_secret' => 'ejWHWzlhm2aJbXv37SkRkeUm-TaAlcj2yXUS-Qy13sM',
  //       'username' => 'scngnr@gmail.com',
  //       'password' => 'scngnr546',
  //       'scope' => '',
  //   ]);
  //   //dd($response->json());
  //   $res = $response->json();
  //   // $parasut->accessToken = $res['access_token'];
  //   return $response->json();
  //
  // }

  public function oAuthToken(){


    $parasut = en_parasut_magza_info::find(1);

    $response = Http::asForm()->post('https://api.parasut.com/oauth/token', [
        'grant_type' => 'password',
        'access_token_url' => 'https://api.parasut.com/oauth/token',
        'client_id' => $parasut->clientId,
        'client_secret' => $parasut->clientSecret,
        'username' => $parasut->kullaniciMail,
        'password' => $parasut->KullaniciPassword,
        'scope' => '',
    ]);
    //dd($response->json());
    $response = $response->json();

    $parasut->accessToken = $response['access_token'];
    $parasut->expires = Carbon::now()->addSeconds($response['expires_in'])->timestamp ;
    $parasut->update();

    return $response;

  }

  public function accesToken(){

    $parasut = en_parasut_magza_info::find(1);
    $controller = new \Scngnr\Parasut\Http\Controllers\Auth();
    $expires =$parasut->expires - Carbon::now()->timestamp;

    if($expires < 5){

      $response = $controller->oAuthToken();
      return $response['access_token'];
    }else {

        return $parasut->accessToken;
    }
  }
}
