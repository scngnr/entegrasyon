<?php

namespace App\Http\Livewire\Admin\Product;

use Livewire\Component;
use App\Models\Urunler;
use App\Models\XmlService;
use Livewire\WithPagination;
use App\Models\N11CategoryService;
use Scngnr\Mdent\Xmlentegrasyon\Models\XmlKategori;

class Dashboard extends Component
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
          $allProduct = Urunler::where('adi', 'LIKE', '%' . $this->searchProduct . '%')->paginate($this->paginate);

        }else {
          $allProduct = Urunler::paginate($this->paginate);
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
        return view('livewire.admin.product.dashboard', ['allProduct' => $allProduct, 'parentkategoriler' => $parentkategoriler,'kategoriler' => $kategoriler])->layout('layouts.mainLayout');
    }
}
