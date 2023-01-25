<?php

namespace App\Http\Livewire\Product\Dashboard\Modal;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Scngnr\Product\Product;
use RealRashid\SweetAlert\Facades\Alert;

class ProductSellerAccountAdd extends ModalComponent
{
  public $productId, $searchValue, $magzaId, $fiyat, $islem, $formul;
   public $pazaryeri = array();



   public function pazaryeriSearch(){

     $pazaryeri = new Product;
     $this->pazaryeri = $pazaryeri->magza->likeSearch($this->searchValue);
   }

    public function pazaryeriPriceAdd(){
      //Product Sınıfını çağır
      $pFId = new Product;
      //productId Array Mı kontrol Et
      if(is_array($this->productId)){
        //Birden Fazla ürün Id var ise döngü ile Product ID leri tara
        for ($i=0; $i < count($this->productId); $i++) {
          $pFId = new Product;
          $pFId->magzaPrice->create($this->productId[$i], $this->searchValue, $this->magzaId, $this->fiyat, $this->islem, $this->formul);
        }
      }else {
        //Tek PRoduct Id var ise çalıştırılacak Blok
        $pFId->magzaPrice->create($this->productId, $this->searchValue, $this->magzaId, $this->fiyat, $this->islem, $this->formul);
      }
      //İşlem Yapılan Mağazanın Bilgilerini PRoduct > Mağaza sınıfından AL
      $pFId = $pFId->magza->find($this->magzaId);
      //SweetAlert İle Başarılı Mesajı içerisine Mağaza Bilgilerini Ekle
      Alert::success($this->searchValue. ' ' . $pFId->magazaAdi , 'Fiyat Ekleme Başarılı');
      //Product Sayfasına Yönlendir
      return redirect('/product');
    }
    public function render()
    {
        return view('view::product.dashboard.modal.product-seller-account-add');
    }
}
