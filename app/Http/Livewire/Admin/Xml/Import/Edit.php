<?php

namespace App\Http\Livewire\Admin\Xml\Import;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\XmlService;

class Edit extends Component
{
    public $urunKategorisss = 5;

    public function render(Request $request)
    {
      $newAllXml = XmlService::find($request->id);
      //dd($newAllXml);
      $xmlBilgileris = json_decode($newAllXml->urunBilgileri); //Seçili olan xml bilgilerini yeni arraya alıyoruz.
      $xmlBilgileri = json_decode(json_encode($xmlBilgileris[0]), true);  //Seçili olan xml bilgilerini objectto array ile yeni arraya alıyoruz.

      //dd(json_decode(json_encode($xmlBilgileris[1]), true));
      $secilixmlBilgileris = json_decode($newAllXml->urunBilgileri); //Seçili olan xml bilgilerini yeni arraya alıyoruz.
      if(array_key_exists(1, $secilixmlBilgileris)){
        $secilixmlBilgileri = json_decode(json_encode($secilixmlBilgileris[1]), true);  //Seçili olan xml bilgilerini objectto array ile yeni arraya alıyoruz.
      }else {
        $secilixmlBilgileri = array();
      }

      //dd($secilixmlBilgileri);
      //dd($this->allXmlBilgileri);

        return view('livewire.admin.xml.import.edit', [
          'xmlArray' => XmlService::find($request->id),
          'xmlBilgileri' => $xmlBilgileri,
          'secilixmlBilgileri' => $secilixmlBilgileri
          ])->layout('layouts.mainLayout');
    }
}
