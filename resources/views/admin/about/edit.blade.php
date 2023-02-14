@extends('layouts.app')

@section('Name', 'Edit | about')

@section('content')

<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="components-preview wide-md mx-auto">
                    <div class="nk-block nk-block-lg">
                        <div class="card card-bordered">
                            <div class="card-inner">
                                <div class="card-head">
                                    <h5 class="card-Name">Edit About</h5>
                                </div>
                                <form action="{{ route('about.update', $about->id)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row g-4">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label">Name</label>
                                                <div class="form-control-wrap">
                                                    <input type="text" class="form-control" name="name" value="{{$about->name}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label" for="full-name-1">Details</label>
                                                <div class="form-control-wrap">
                                                    <textarea class="form-control" name="details" value="">{{$about->details}}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-label">Image</label>
                                                <div class="form-control-wrap">
                                                    <img src="{{ asset('uploads/about/'.$about->image)}}" style="height:80px; width:160px" alt="">
                                                    <input type="file" class="form-control" name="image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- .nk-block -->
                </div><!-- .components-preview -->
            </div>
        </div>
    </div>
</div>

@endsection
