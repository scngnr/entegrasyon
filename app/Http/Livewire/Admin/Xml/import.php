<?php

namespace App\Http\Livewire\Admin\Xml;

use Livewire\Component;
use App\Models\XmlService;

class import extends Component
{

    public function render()
    {
                
        return view('livewire.admin.xml.import', ['allXml' => XmlService::all()])->layout('layouts.mainLayout');
    }
}
