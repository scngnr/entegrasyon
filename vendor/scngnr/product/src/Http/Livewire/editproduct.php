<?php

namespace Scngnr\Product\Http\Livewire;

use Livewire\Component;
use Scngnr\Product\Models\en_product;
use App\Models\XmlService;
use Livewire\WithPagination;
use App\Models\N11CategoryService;
use Scngnr\Xmlservice\Models\XmlKategori;

class editProduct extends Component
{
  use WithPagination;
    public $urunId;

    public function Mount($id){
      $this->urunId = $id;
    }
    public function render()
    {


      return view('view::editProduct', ['product' => en_product::find($this->urunId), 'kategoriler' => XmlKategori::all()])->layout('layouts.mainLayout');
    }
}
