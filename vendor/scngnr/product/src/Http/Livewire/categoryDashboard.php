<?php

namespace Scngnr\Product\Http\Livewire;

use Livewire\Component;
use Scngnr\Product\Models\en_product as Urunler;
use App\Models\XmlService;
use Livewire\WithPagination;
use App\Models\N11CategoryService;
use Scngnr\Xmlservice\Models\XmlKategori;

class categoryDashboard extends Component
{
  use WithPagination;

    public function render()
    {


      return view('view::categoryDashboard', ['allCategory' => XmlKategori::all()])->layout('layouts.mainLayout');
    }
}
