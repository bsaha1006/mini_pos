@extends('layout.main')
@section('main_content')
  <div class="row mb-3">
      <div class="col-md-6"></div>
      <div class="col-md-6 text-right">
          <a href="{{route('users.create')}}" class="btn btn-primary"> <i class="fa fa-plus"></i> New User</a>
      </div>
  </div>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">User List</h6>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>Name</th>
                          <th>Group</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Address</th>
                          <th class="text-right">Action</th>
                      </tr>
                  </thead>
                  <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Group</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th class="text-right">Action</th>
                        </tr>
                  </tfoot>
                  <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->group->title}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->phone}}</td>
                                <td>{{$user->address}}</td>
                                <td class="text-right">
                                    {!! Form::open(['route' => ['users.destroy',$user->id],'method' => 'post']) !!}
                                        <a href="{{route('users.show',$user->id)}}" class="btn btn-primary" > <i class="fa fa-eye"></i></a>
                                        <a href="{{route('users.edit',$user->id)}}" class="btn btn-primary" > <i class="fa fa-edit"></i></a>
                                        @method('delete')
                                        <button onclick="return confirm('Are You Sure? You want to delete this group.')" class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> </button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>
@stop