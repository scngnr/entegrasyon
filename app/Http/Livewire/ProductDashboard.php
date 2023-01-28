<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Scngnr\Product\Product;
use Livewire\WithPagination;
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

     //Product Sayfasındaki Tüm ürünlerin checkbox larını işaretler
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

     //WooCommerce Product Methodu ile Tekli Ürün YÜkleme
     public function gonder($pazaryeri, $productId, $magzaId=2){
       switch ($pazaryeri) {
         case 'woocommerce': $cl = new \Scngnr\Pazaryeri\Wordpress\Controllers\ProductController(); $cl->statu($magzaId, $productId);  break;
         case 'n11':  break;
       }
     }

     //$this->gonder methodu ile çoklu Ürün Yükleme
     public function topluGonder($pazaryeri,  $magzaId){
       for ($i=0; $i < count($this->selectedCheckBox) ; $i++) {
         $this->gonder($pazaryeri, $this->selectedCheckBox[$i], $magzaId);
       }
     }

    public function render(){
        //Product Sınıfını Çağır
        $products = new Product;

        if($this->searchProduct){
          //Product Sınıfını kullnarak Like aramsı yap
          $allProduct =$products->product->likeSearch($this->searchProduct, $this->paginate);
        }else {
          //Product Sınıfından Ürünleri Al
          $allProduct =$products->product->index(true, $this->paginate);
        }

        return view('view::dashboard', [
          'allProduct' => $allProduct
          ])->layout('layouts.mainLayout');
    }
  }
