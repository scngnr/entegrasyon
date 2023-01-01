<?php

namespace App\Http\Livewire\Admin\Xml;

use Livewire\Component;

class Export extends Component
{
    public function render()
    {
        return view('livewire.admin.xml.export')->layout('layouts.mainLayout');
      }
}
