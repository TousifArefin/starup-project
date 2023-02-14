<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.project.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.project.create');
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
            'service' => 'required',
            'title' => 'required',
            'details' => 'required',
            'image' => 'required',
        ]);

        $img = $request->file('image');
        $slug = str_slug($request->title);

        if(isset($img)){
            $curntDate = Carbon::now()->toDateString();
            $imgname = $slug.'-'.$curntDate.'-'.'.'.$img->getClientOriginalExtension();

            if(!file_exists('uploads/project')){
                mkdir('uploads/project',077,true);
            }
            $img ->move('uploads/project', $imgname);
        }else{
            $imgname = 'default.png';
        }

        $project = new project();
        $project -> service_id = $request->service;
        $project -> title = $request-> title;
        $project -> details = $request -> details;
        $project -> image = $imgname;
        $project -> save();
        return redirect()->route('project.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $projects = Project::all();
        return view('home.web',compact('projects'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $project = Project::find($id);
        return view('admin.project.edit', compact('project'));
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
            'service' => 'required',
            'title' => 'required',
            'details' => 'required',
            'image' => 'required',
        ]);

        $project = project::find($id);

        $img = $request->file('image');
        $slug = str_slug($request->title);

        if(isset($img)){
            $crntdate = Carbon::now()->toDateString();
            $imgname = $slug.'.'.$crntdate.'-'.'.'.$img->getClientOriginalExtension();

            if (!file_exists('uploads/project')) {
                mkdir('uploads/project',077,true);
            }
            $img -> move('uploads/project',$imgname);
        }else{
            $imgname = 'defult.png';
        }

        $project = project::find($id);
        $project -> title = $request -> title;
        $project -> details = $request -> details;
        $project -> image = $imgname;
        $project -> save();
        return redirect()->route('project.index');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        if (!file_exists('uploads/project')) {
            unlink('uploads/project',$project->image);
        }
        $project -> delete();
        return redirect()->route('project.index');
    }
}
