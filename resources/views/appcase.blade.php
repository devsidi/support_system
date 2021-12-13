@extends('layouts.app')

@section('content')
<div class="fluid-container" style="padding-top:80px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Ticket Information
                </div> 
                <div class="card-body"> 
                    <form method="POST" action="{{ url('/updatecase', $listing->id) }}">
                        @csrf
                        <input name="app_ver_by" type="text" class="form-control" value="{{ Auth::user()->name }}" hidden>
                        <div class="form-group mb-2">
                            <label for="req">Case ID</label>
                            <input name="case_id" type="text" class="form-control" value="{{$listing->case_id}}" disabled>
                        </div> 
                        <div class="form-group mb-2">
                            <label for="req">Requestor Name</label>
                            <input name="name" type="text" class="form-control" value="{{$listing->name}}" disabled>
                        </div> 
                        <div class="form-group mb-2">
                            <label for="req">Service Type</label>
                            <input name="department" type="text" class="form-control" value="{{$listing->service_type}}" disabled>
                        </div> 
                        <div class="form-group mb-2">
                            <label for="req">Department Name</label>
                            <input name="department" type="text" class="form-control" value="{{$listing->department}}" disabled>
                        </div> 
                        <div class="form-group mb-2">
                            <label for="remarks">Remarks requestor</label>
                            <input name="remarks" type="text" class="form-control" value="{{$listing->remarks}}" disabled>
                        </div> 
                        <div class="form-group mb-2">
                            <label for="created_at">Date requested</label>
                            <input name="created_at" type="text" class="form-control" value="{{$listing->created_at->format('d/m/Y')}}" disabled>
                        </div> 
                        <div class="form-group mb-2">
                            <label for="approved_by">Approval Name</label>
                            <input name="approved_by" type="text" class="form-control" value="{{ Auth::user()->name }}" disabled>
                        </div> 
                        <div class="form-group mb-2">
                            <label for="req">Verified by</label>
                            <input name="actions" type="text" class="form-control" value="{{ Auth::user()->name}}" disabled>
                        </div> 
                        <div class="row mb-3">
                                <label for="assign_to" class="col-form-label text-md-right">Assign to</label>
                                <div class="col"> 
                                    <select class="form-control" name="assign_to" required>
                                        <option>Choose agent...</option>
                                        @foreach($supportagent as $supportagents)
                                            <option value="{{ $supportagents->name }}"> 
                                                {{ $supportagents->name }} 
                                            </option>
                                        @endforeach    
                                    </select>
                                </div>
                        </div>  
                        <div class="row mb-3">
                                <label for="action" name="description" class="col-form-label text-md-right">Action Remarks</label>
                                <div class="col">  
                                    <textarea name="description" class="container" rows="7"></textarea>
                                </div> 
                            </div>   
                        <div class="row mt-0">
                            <div class="col-form-label">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Assign Case') }}
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
