<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Scngnr\Product\Product;
use Livewire\WithPagination;
use Scngnr\Pazaryeri\Wordpress\Controller\ProductController;

class productDashboard extends Component
{
  use WithPagination;

    public $paginate = 20, $selectedCheckBox= [], $allSelectCheckBox = 0, $searchProduct = '';
    public $category = '';
    private $allProduct ;

    public function Mount(){
    $productClass = new Product;
      $this->allProduct = $productClass->product->index(true, $this->paginate);

     }

     //Product Sayfasındaki Tüm ürünlerin checkbox larını işaretler
     public function allSelect(){
       $this->allSelectCheckBox++;
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

     //Kategori Fonskiyonu
     public function categories($catId){
       $this->category = $catId;
     }

    public function render(){
        //Product Sınıfını Çağır
        $productClass = new Product;



        //Kategori Arama
        if($this->category){
          //Kategori ve İnput ile Ürün Kategori Like Arama Kısmı
          $this->allProduct = $productClass->product->likeSearchWithCategory($this->searchProduct, $this->category, $this->paginate);
        }else {
          //Kategori Boş iken Ürün Araması Ürün Arama Kısmı
          if($this->searchProduct){
            //Product Sınıfını kullnarak Like aramsı yap
            $this->allProduct = $productClass->product->likeSearch($this->searchProduct, $this->paginate);
          }else {
            //Product Sınıfından Ürünleri Al
            $this->allProduct = $productClass->product->index(true, $this->paginate);
          }
        }


        //allSelectCheckBox İşaretlenirse Tüm Ürünler Seçilir
        if($this->allSelectCheckBox == 1){
          for ($i=0; $i < count($this->allProduct); $i++) {                  //sayfada bulunan tüm ürünlerin idlerini al
            $this->selectedCheckBox[$i] = $this->allProduct[$i]->id;                  // Tüm checkboxları işaretle
          }
        }else if ($this->allSelectCheckBox == 2) {
          $this->selectedCheckBox = [];
          $this->allSelectCheckBox = 0;
        }

        $allCategory =$productClass->category->index();

        return view('view::dashboard', [
          'allProduct'  => $this->allProduct,
          'allCategory' => $allCategory
          ])->layout('layouts.mainLayout');
    }
  }
