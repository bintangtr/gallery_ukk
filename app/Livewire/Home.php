<?php

namespace App\Livewire;

use App\Models\Foto;
use Livewire\Component;

class Home extends Component
{

    // public $photos;

    // public function mount()
    // {
    //     // Mengambil data foto dari database
    //     $this->photos = Foto::all();
    // }

    public function render()
    {
        return view('livewire.home');
    }
}
