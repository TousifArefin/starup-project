<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Service;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $abouts = About::all();
        $sliders = Slider::all();
        return view('home.welcome', compact('sliders','abouts'));
    }
}
