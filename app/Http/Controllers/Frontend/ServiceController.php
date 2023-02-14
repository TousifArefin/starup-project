<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function getService($slug)
    {
        $service = Service::where('slug',$slug)->first();

        return view('home.web',compact('service'));
    }


    public function AllService()
    {
        return view('home.service');
    }

}
