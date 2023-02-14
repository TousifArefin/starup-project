@extends('layouts.app')

@section('title', 'About')

@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview wide-md mx-auto">
                    <div class="nk-block nk-block-lg">
                        <a href="{{route('about.create')}}" class="btn btn-primary">ADD NEW</a>
                        <div class="card card-preview">
                            <div class="card-header text-white bg-primary">
                                <h4 class="card-title">All About</h4>
                            </div>
                            <div class="card-inner">
                                <table class="datatable-init nowrap table">
                                    <thead>
                                        <tr>
                                            <th>Sl</th>
                                            <th>Title</th>
                                            <th>Details</th>
                                            <th>Image</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($abouts as $key=>$about)
                                        <tr>

                                            <td>{{ $key+1}}</td>
                                            <td>{{ $about->title}}</td>
                                            <td>{{ $about->details}}</td>
                                            <td><img src="{{ asset('uploads/about/'.$about->image)}}" style="height:80px; width:160px" alt=""></td>
                                            <td>
                                                <a href="{{ route('about.edit',$about->id) }}" class="btn btn-info"><i class="material-icons">edit</i></a>
                                                <form id="delete-form-{{ $about->id }}" action="{{ route('about.destroy', $about->id )}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    </form>
                                                    <button type="button" class="btn btn-danger" onclick="if(confirm('Are you sure to delete this?')){
                                                      event.preventDefault(); document.getElementById('delete-form-{{ $about->id }}').submit();
                                                    }else{
                                                      event.preventDefault();
                                                    }
                                                    "><i class="material-icons">delete</i></button>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div><!-- .card-preview -->
                    </div> <!-- nk-block -->
                </div><!-- .components-preview -->
            </div>
        </div>
    </div>
</div>

@endsection
