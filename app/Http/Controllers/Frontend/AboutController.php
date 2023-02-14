<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('home.about',);
    }

}
