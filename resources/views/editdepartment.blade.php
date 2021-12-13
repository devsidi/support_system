@extends('layouts.app')

@section('content')
<div class="fluid-container" style="padding-top:80px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Edit Department
                </div> 
                <div class="card-body"> 
                    <form method="POST" action="{{ url('/updatedepartment', $department->id) }}">
                        @csrf 
                        <div class="form-group mb-2">
                            <label for="department">Department Name</label>
                            <input name="department" type="text" class="form-control" id="department" value="{{$department->name}}">
                        </div> 
                        <div class="row mb-3">
                            <label for="status" class="col-form-label text-md-right">status Type</label>
                            <div class="col"> 
                                <select class="form-control" name="status" required> 
                                    <!-- @foreach($department as $departments) -->
                                        <!-- <option value="{{$department->status}}">{{$department->status}}</option> -->
                                        <option value="ACTIVE">Active</option>
                                        <option value="DISABLE">Disable</option>
                                    <!-- @endforeach     -->
                                </select>
                            </div>
                        </div>  
                        <div class="row mt-0">
                            <div class="col-form-label">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit Department') }}
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
