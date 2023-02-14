@extends('layouts.app')

@section('title', 'Service')

@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md mx-auto">
                        <div class="nk-block nk-block-lg">
                            <a href="/admin/service/create" class="btn btn-primary">ADD NEW</a>
                            <div class="card card-preview">
                                <div class="card-header text-white bg-primary">
                                    <h4 class="card-title">All Service</h4>
                                </div>
                                <div class="card-inner">
                                    <table class="datatable-init nowrap table">
                                        <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Servic Name</th>
                                                <th>Details</th>
                                                <th>Slug</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($services as $key => $service)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $service->name }}</td>
                                                    <td>{{ $service->details }}</td>
                                                    <td>{{ $service->slug }}</td>
                                                    <td>
                                                        <a href="{{ route('service.edit', $service->id) }}"
                                                            class="btn btn-info"><i class="material-icons">edit</i></a>
                                                        <form id="delete-form-{{ $service->id }}"
                                                            action="{{ route('service.destroy', $service->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                        <button type="button" class="btn btn-danger"
                                                            onclick="if(confirm('Are you sure to delete this?')){
                                                      event.preventDefault(); document.getElementById('delete-form-{{ $service->id }}').submit();
                                                    }else{
                                                      event.preventDefault();
                                                    }
                                                    "><i
                                                                class="material-icons">delete</i></button>
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
