@extends('layouts.app')

@section('content')
<div class="fluid-container" style="padding-top:80px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
              <table class="table table-striped table-hover">
                <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Ticket ID</th>
                  <th scope="col">Assign to</th>
                  <th scope="col">Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach( $submittedrequest as $submittedrequests)
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $submittedrequests->case_id }}</td>
                  @if ( $submittedrequests->assign_to == null)
                  <td> Not Assigned to anyone yet</td>
                  @else
                  <td>{{ $submittedrequests->assign_to }}</td>
                  @endif
                  <td>{{ $submittedrequests->status }}</td> 
                </tr> 
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
      </div>
</div>
@endsection
