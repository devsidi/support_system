@extends('layouts.app')

@section('content')
<div class="fluid-container" style="padding-top:80px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit Service Type
                </div> 
                <div class="card-body"> 
                @if (Session::has('msg'))
                <div class="mb-3 alert alert-primary" role="alert">
                    {{Session::get('msg')}}
                </div>
                @endif
                    <form method="POST" action="{{ url('/updateservice', $service->id) }}">
                        @csrf 
                        <div class="form-group mb-2">
                            <label for="department">Service type</label>
                            <input name="service" type="text" class="form-control" id="service" value="{{$service->name}}">
                        </div> 
                        <div class="row mb-3">
                            <label for="status" class="col-form-label text-md-right">status Type</label>
                            <div class="col"> 
                                <select class="form-control" name="status" required>  
                                        <option value="">Choose status</option>
                                        <option value="ACTIVE">Active</option>
                                        <option value="DISABLE">Disable</option> 
                                </select>
                            </div>
                        </div>  
                        <div class="row mt-0">
                            <div class="col-form-label">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update Service') }}
                                </button>
                            </div>
                        </div>
                    </form> 
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection
