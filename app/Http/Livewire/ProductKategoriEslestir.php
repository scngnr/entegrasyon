<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Scngnr\Product\Product;
use RealRashid\SweetAlert\Facades\Alert;

class ProductKategoriEslestir extends Component
{
  public $productId, $searchValue, $magzaId;
   public $pazaryeri = array();

   //Url ile Bildirilen Ürün Idsi
    public function Mount($id){
     $this->productId = $id;
    }

   public function pazaryeriSearch(){

     $pazaryeri = new Product;
     $this->pazaryeri = $pazaryeri->magza->likeSearch($this->searchValue);
   }

   public function productMatches(){

      $product = new Product;
      $product->match->create($this->productId, $this->magzaId);

      //SweetAlert İle Başarılı Mesajı içerisine Mağaza Bilgilerini Ekle
      Alert::success('KategoriEşleştirme Başarılı');
      //Product Sayfasına Yönlendir
      return redirect('/product');
   }

    public function render()
    {
        return view('view::product-kategori-eslestir')->layout('layouts.mainLayout');
    }
}
