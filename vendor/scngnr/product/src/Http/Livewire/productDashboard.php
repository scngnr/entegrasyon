<?php

namespace Scngnr\Product\Http\Livewire;

use Livewire\Component;
use Scngnr\Product\Models\en_product as Urunler;
use Scngnr\Product\Models\pazaryeri_fiyat;
use App\Models\XmlService;
use Livewire\WithPagination;
use App\Models\N11CategoryService;
use Scngnr\Xmlservice\Models\XmlKategori;

class productDashboard extends Component
{
  use WithPagination;

    public $paginate = 25, $selectedCheckBox= [], $allSelectCheckBox = 0, $searchProduct = '';

    public function paginates ($deger){
      $this->paginate = $deger;
    }

    public function resetsPage(){

          $this->resetPage();
     }

     public function allSelect(){

       $this->allSelectCheckBox++;
     }

    public function render()
    {

        if($this->searchProduct){
          $allProduct = Urunler::where('adi', 'LIKE', '%' . $this->searchProduct . '%')
                                  orWhere('stockCode', 'LIKE', '%' . $this->searchProduct . '%')
                                  ->paginate($this->paginate);

        }else {
          $allProduct = Urunler::
          //all();
          paginate($this->paginate);
        }

        /*//////////////////////////////////////////////////////////////////////
        *                       checkbox Select İşlemi
        * ///////////////////////////////////////////////////////////////////////
        *
        */
        if($this->allSelectCheckBox == 1){
          for ($i=0; $i < count($allProduct->items()); $i++) {                  //sayfada bulunan tüm ürünlerin idlerini al
            $this->selectedCheckBox[$i] = $allProduct[$i]->id;                  // Tüm checkboxları işaretle
          }
        }else if ($this->allSelectCheckBox == 2) {
          $this->selectedCheckBox = [];
          $this->allSelectCheckBox = 0;
        }

        $parentkategoriler = XmlKategori::where('parentCategory', NULL)->get();
        $kategoriler = XmlKategori::all();

        // $urun= Urunler::find(1970);
        // $urun = explode('>', $urun->katagorisi);
        // $urunc = count($urun);
        // dd($urun[$urunc-1]);
        return view('view::dashboard', ['allProduct' => $allProduct, 'parentkategoriler' => $parentkategoriler,'kategoriler' => $kategoriler, 'pF' => pazaryeri_fiyat::all()])->layout('layouts.mainLayout');
    }
}
