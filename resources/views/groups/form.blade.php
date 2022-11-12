@extends('layout.main')
@section('main_content')
<h2>Add New Group</h2>
<div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">New Group</h6>
      </div>
      <div class="card-body">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
              <div class="table-responsive">
                {!! Form::open(['route' => 'groups.store','method' => 'post']) !!}
                  <div class="form-group">
                      <label for="group">User Group</label>
                      <input name="title" type="text" class="form-control" id="group" aria-describedby="emailHelp" placeholder="User Group">
                  </div>
                  <button class="btn btn-primary" type="submit">Submit</button>
                {!! Form::close() !!}
              </div>
            </div>
        </div>
      </div>
  </div>
@stop