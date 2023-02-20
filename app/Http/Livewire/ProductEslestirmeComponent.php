<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Scngnr\Product\Models\N11CategoryService;

class ProductEslestirmeComponent extends Component
{
  public $allKategori = array(), $searchValues = '', $selectedCategory ;

     public function kategori($id){

         $this->selectedCategory = $id;
     }


    public function render()
    {
        if($this->searchValues){
          $this->allKategori = N11CategoryService::orWhere('categoryName', 'LIKE', '%' . $this->searchValues . '%')->get();
        }

        return view('view::product-eslestirme-component');
    }
}
