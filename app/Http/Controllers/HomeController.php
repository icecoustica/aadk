<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

class HomeController extends Controller
{
    public function index()
   {
        // Ambil semua gambar dari database
        $images = Image::all();

        // Hantar data ke view
        return view('home', compact('images'));
    }
}
