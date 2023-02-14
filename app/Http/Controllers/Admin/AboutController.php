<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::all();
        return view('admin.about.index',compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'details' => 'required',
            'image' => 'required|mimes:png,jpg'
        ]);

        $image = $request->file('image');
        $slug = str_slug($request->title);

        if (isset($image)) {
            $crntDate = Carbon::now()->toDateString();
            $imgname = $slug.'-'.$crntDate.'-'.'.'.$image->getClientOriginalExtension();


            if (!file_exists('uploads/about')) {
                mkdir('uploads/about',077,true);
            }
            $image ->move('uploads/about',$imgname);
        }else{
            $imgname = 'default.png';
        }

        $about = new About();
        $about -> title = $request -> title;
        $about -> details = $request -> details;
        $about -> image = $imgname;
        $about -> save();
        return redirect()->route('about.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $about = About::find($id);
        return view('admin.about.edit',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required',
            'details' => 'required',
            'image' => 'required|mimes:png,jpg'
        ]);

        $about = About::find($id);

        $image = $request->file('image');
        $slug = str_slug($request->title);

        if (isset($image)) {
            $crntDate = Carbon::now()->toDateString();
            $imgname = $slug.'-'.$crntDate.'-'.'.'.$image->getClientOriginalExtension();


            if (!file_exists('uploads/about')) {
                mkdir('uploads/about',077,true);
            }
            $image ->move('uploads/about',$imgname);
        }else{
            $imgname = 'default.png';
        }

        $about = About::find($id);
        $about -> title = $request -> title;
        $about -> details = $request -> details;
        $about -> image = $imgname;
        $about -> save();
        return redirect()->route('about.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $about = About::find($id);
        if (!file_exists('uploads/about')) {
            unlink('uploads/about',$about->image);
        }
        $about -> delete();
        return redirect()->route('about.index');
    }
}
