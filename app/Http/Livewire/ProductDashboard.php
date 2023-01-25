<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Scngnr\Product\Models\en_product as Urunler;
use Scngnr\Product\Models\pazaryeri_fiyat;
use App\Models\XmlService;
use Livewire\WithPagination;
use App\Models\N11CategoryService;
use Scngnr\Xmlservice\Models\XmlKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

use Scngnr\Product\Product;
use Scngnr\Pazaryeri\Wordpress\Controller\ProductController;

class productDashboard extends Component
{
  use WithPagination;

    public $paginate =15, $selectedCheckBox= [], $allSelectCheckBox = 0, $searchProduct = '';
    public $durum;
    public function paginates ($deger){
      $this->paginate = $deger;
    }

    public function resetsPage(){

          $this->resetPage();
     }

     public function allSelect(){

       $this->allSelectCheckBox++;
       $products = new Product;
       $allProduct =$products->product->likeSearch($this->searchProduct, $this->paginate);

       if($this->allSelectCheckBox == 1){
         for ($i=0; $i < count($allProduct->items()); $i++) {                  //sayfada bulunan tüm ürünlerin idlerini al
           $this->selectedCheckBox[$i] = $allProduct[$i]->id;                  // Tüm checkboxları işaretle
         }
       }else if ($this->allSelectCheckBox == 2) {
         $this->selectedCheckBox = [];
         $this->allSelectCheckBox = 0;
       }
     }

     public function gonder($pazaryeri, $productId,$magzaId=2){

       switch ($pazaryeri) {
         case 'woocommerce': $cl = new \Scngnr\Pazaryeri\Wordpress\Controllers\ProductController(); $cl->statu($magzaId, $productId);  break;
         case 'n11':  break;
       }
     }

    public function render()
    {
        //Product Sınıfını Çağır
        $products = new Product;

        if($this->searchProduct){
          //Product Sınıfını kullnarak Like aramsı yap
          $allProduct =$products->product->likeSearch($this->searchProduct, $this->paginate);
        }else {
          //Product Sınıfından Ürünleri Al
          $allProduct =$products->product->index(true, $this->paginate);
        }



        $parentkategoriler = XmlKategori::where('parentCategory', NULL)->get();
        $kategoriler = XmlKategori::all();

        // $urun= Urunler::find(1970);
        // $urun = explode('>', $urun->katagorisi);
        // $urunc = count($urun);
        // dd($urun[$urunc-1]);
        return view('view::dashboard', [
          'allProduct' => $allProduct,
          'parentkategoriler' => $parentkategoriler,
          'kategoriler' => $kategoriler,
          'pF' => pazaryeri_fiyat::all()])->layout('layouts.mainLayout');
    }
  }
