<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public $photos;

    public function home()
    {
        $photos = Foto::all();
        return view('page.home', compact('photos'));
    }

}
