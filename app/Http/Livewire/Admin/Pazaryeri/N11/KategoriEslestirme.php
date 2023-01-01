<?php

namespace App\Http\Livewire\Admin\Pazaryeri\N11;

use Livewire\Component;
use App\Models\N11CategoryService;
use App\Models\Urunler;
use App\Models\XmlService;
use IS\PazarYeri\N11\N11Client;
use Illuminate\Support\Facades\DB;


class KategoriEslestirme extends Component
{
    public function render()
    {
      //dd();

      $xml = XmlService::all();
      $katagoriList = array();
      for ($i=0; $i < count($xml); $i++) {

        $xmlJson = json_decode($xml[$i]->urunBilgileri);
        $xmlJson = json_decode(json_encode($xmlJson[2]), true);
        //dd($xmlJson);
        $katagoriList = array_merge($katagoriList , $xmlJson);
      }

      dd($katagoriList);
      // $xml =json_decode(json_encode($xml->urunBilgileri), true);
      // $client = new N11Client();
      // $client->setApiKey('801d611a-58df-441a-b146-468d624bf145');
      // $client->setApiPassword('QQUm3FV27f0U0JGI');
      //
      //   $eslestirme = N11CategoryService::where('categoryName', 'LIKE', '%kahvaltı%')->get();
      //   $sorgu = N11CategoryService::where( 'categoryId', $eslestirme[0]->parentCategoryId)->first();
      //
      //   $kategori[0] = $eslestirme[0]->categoryName;
      //   if($sorgu){
      //     $kategori[1] = $sorgu->categoryName;
      //     $sorgu = N11CategoryService::where( 'categoryId', $sorgu->parentCategoryId)->first();
      //
      //   }
      //   dd($client->category->getCategoryAttributesId($eslestirme[0]->categoryId));
        //dd($client->category->getCategoryAttributeValue(354446908));

        return view('livewire.admin.pazaryeri.n11.kategori-eslestirme')->layout('layouts.mainLayout');
    }
}
