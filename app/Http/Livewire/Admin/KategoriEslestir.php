<?php

namespace App\Http\Livewire\Admin\Product;
use Illuminate\Http\Request;
use App\Models\N11CategoryService;
use Livewire\Component;
use IS\PazarYeri\N11\N11Client;
use Carbon\Carbon;

class KategoriEslestir extends Component
{
    public $kategori = '', $kategoriDeger, $secilmisKategori, $secilmisKategoriAttribute =[], $secilmisKategoriAttributeValueLists;
    public $urlUrunId;

    public function Mount($id){
      $this->urlUrunId = $id;

    }

    public function kategoriFunction(){
      $this->kategoriDeger = $this->kategori;
    }

    public function secilmisKategori($ids, Request $request){

      $this->secilmisKategori = $ids;
      $client = new N11Client();
      $client->setApiKey('801d611a-58df-441a-b146-468d624bf145');
      $client->setApiPassword('QQUm3FV27f0U0JGI');

       $parentCategory = N11CategoryService::where('categoryId', $this->secilmisKategori)->first();
      // for ($i=0; $i < 3 ; $i++) {
      //   if($parentCategory->parentCategoryId){
      //     $parentCategory = N11CategoryService::where('categoryId', $parentCategory->parentCategoryId)->first();
      //   }
      // }
      $secilmisKategoriAttributeList                                            = json_decode($parentCategory->attributeList, true);
      $this->secilmisKategoriAttribute                                          = $secilmisKategoriAttributeList;

      $this->secilmisKategoriAttributeValueLists                                = json_decode($parentCategory->attributeValue, true);


      //dd($this->secilmisKategoriAttribute);
      //dd($this->secilmisKategoriAttributeValueLists);
      }
      public function resetsPage(){

            $this->resetPage();
       }
    public function render(Request $request)
    {

        $kategoriBul = N11CategoryService::where('categoryName', 'LIKE' , '%' . $this->kategoriDeger . '%')->get();
        $frontEndUrunId = $request->segment(3);

        //dd($request->page);
        if($request->page){
          redirect('product/kategorieslestirme/V3lJeElsMD0');
        }
        if($this->kategoriDeger){

        }else {
          $kategoriBul = [];
        }

        if($this->secilmisKategori){
          //dd($this->secilmisKategoriAttribute);

        }else {
          $this->secilmisKategoriAttribute = 0;
        }


        //dd($this->secilmisKategoriAttribute);
        //dd($this->secilmisKategoriAttributeValueLists);
        //dd($this->secilmisKategoriAttributeValueLists);
        return view('livewire.admin.product.kategori-eslestir',
        [
          'urlUrunId'                           => $this->urlUrunId,
          'kategoriBul'                         => $kategoriBul,
          'secilmisKategoriAttribute'           => $this->secilmisKategoriAttribute,
          'secilmisKategoriAttributeValueLists' => $this->secilmisKategoriAttributeValueLists,
          'frontEndUrunId'                      => $this->urlUrunId
          ])->layout('layouts.mainLayout');
    }
}
