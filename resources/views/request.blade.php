@extends('layouts.app')

@section('content')
<div class="fluid-container" style="padding-top:80px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Request Form') }}</div> 
                @if (Session::has('msg'))
                <div class="mb-3 alert alert-primary" role="alert">
                    {{Session::get('msg')}}
                </div>
                @else 
                    <div class="card-body">
                        <form method="POST" action="{{ route('submittedrequest') }}">
                            @csrf 
                            <div class="row mb-3">
                                <label for="name" class="col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email" disabled>
                                </div>
                            </div>   
                            <div class="row mb-3">
                                <label for="department" class="col-form-label text-md-right">Department</label>
                                <div class="col"> 
                                    <select class="form-control" name="department" required>
                                        <option>Choose Department</option>
                                        @foreach($department as $departments)
                                            <option value="{{ $departments->id }}"> 
                                                {{ $departments->name }} 
                                            </option>
                                        @endforeach    
                                    </select>
                                </div>
                            </div>   
                            <div class="row mb-3">
                                <label for="service" class="col-form-label text-md-right">Service Type</label>
                                <div class="col"> 
                                    <select class="form-control" name="service" required>
                                        <option>Choose...</option>
                                        @foreach($servicetype as $service)
                                            <option value="{{ $service->id }}"> 
                                                {{ $service->name }} 
                                            </option>
                                        @endforeach    
                                    </select>
                                </div>
                            </div>   

                            <div class="row mb-3">
                                <label for="description" name="description" class="col-form-label text-md-right">Request Description</label>
                                <div class="col">  
                                    <textarea name="description" class="container" id="exampleFormControlTextarea1" rows="7"></textarea>
                                </div> 
                            </div>   
                            <div class="row mb-0">
                                <div class="col-form-label">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit Support Request') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
