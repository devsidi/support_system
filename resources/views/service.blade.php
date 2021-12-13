@extends('layouts.app')

@section('content')
<div class="fluid-container" style="padding-top:80px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Add Services type
                </div>
                    @if (Session::has('msg'))
                    <div class="mb-3 alert alert-primary" role="alert">
                        {{Session::get('msg')}}
                    </div>
                        @else 
                <div class="card-body"> 
                    <form method="POST" action="{{ route('service') }}">
                        @csrf 
                    <div class="form-group mb-2">
                        <label for="service">Service Name</label>
                        <input name="service" type="text" class="form-control">
                    </div> 
                    <div class="row mt-0">
                        <div class="col-form-label">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Submit Service Type') }}
                            </button>
                        </div>
                    </div>
                    </form>
                    @endif
                </div>
            </div>
        </div><br>

        <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                ALl Service
            </div> 
            @if (Session::has('del'))
                <div class="mb-3 alert alert-danger" role="alert">
                    {{Session::get('del')}}
                </div>
            @endif
                <div class="card-body"> 
                    <form method="POST" action="{{ url('/editservice/{id}') }}">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col" style="width:10px">#</th>
                                <th scope="col">Service Name</th>
                                <th scope="col">Status</th>
                                <th scope="col" style="width:250px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($service as $services)
                                <tr>
                                <th scope="row">{{ $loop-> iteration}}.</th>
                                <td>{{$services->name}}</td> 
                                <td>{{$services->status}}</td> 
                                <td><button type="button" class="btn btn-info"><a href="{{ url('/editservice',$services->id) }}">Edit/Update</a></button>
                                <button type="button" class="btn btn-danger"><a href="{{ url('/deleteservice',$services->id) }}">Delete</a></button></td> 
                                </tr> 
                                @endforeach
                            </tbody>
                        </table> 
                    </form>
                </div>
            </div>
        </div>  
</div> 
@endsection
