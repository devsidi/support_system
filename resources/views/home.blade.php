@extends('layouts.app')

@section('content')
<div class="container" style="padding-top:80px;"> 
        <div class="card">
            <div class="card-header">
            {{ __('Dashboard') }}
            </div>
            <div class="card-body">
                <h5 class="card-title">Submit Request Form</h5>
                <p class="card-text"></p>
                <a href="{{'/request'}}" class="btn btn-primary">Generate Request</a>
            </div>
        </div>
</div>
@endsection
