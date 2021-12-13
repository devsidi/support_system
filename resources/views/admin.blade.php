@extends('layouts.app')

@section('content')
<div class="fluid-container" style="padding-top:80px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card">
        <div class="card-header">
            Admin Dashboard Features
        </div>
        <div class="card-body"> 
            <p class="card-text">Add new department or type of services.</p>
            <a href="{{ route('department')}}" class="btn btn-primary">Department</a>
            <a href="{{ route('service')}}" class="btn btn-primary">Service</a>
        </div>
        </div><br>
            <div class="card">
                <div class="card-header">{{ __('New List Ticketing') }}</div>  
                <div class="card-body"> 
                <table class="table">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Case ID</th>
                    <th scope="col">Requestor</th>
                    <th scope="col">Department</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($listing as $listings)
                    <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $listings-> case_id}}</td>
                    <td>{{ $listings-> name}}</td>
                    <td>{{ $listings-> Department}}</td> 
                    <td><button type="button" class="btn btn-light"><a href="{{ url('/appcase',$listings->id) }}">Approve</a></button> 
                        <button type="button" class="btn btn-warning">Disaproved</button></td> 
                    </tr> 
                    @endforeach
                </tbody>
                </table>
                </div> 
            </div>
        </div>
    </div>
</div>
@endsection
