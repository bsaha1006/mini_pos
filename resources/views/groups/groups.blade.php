@extends('layout.main')
@section('main_content')
   <div class="row">
        <div class="col-md-6"><h2>Users' Group</h2></div>
        <div class="col-md-6 text-right"><a href="{{url('groups/create')}}" class="btn btn-primary"> <i class="fa fa-plus"></i> New Group</a></div>
   </div>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>Title</th>
                          <th class="text-right">Action</th>
                      </tr>
                  </thead>
                  <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th class="text-right">Action</th>
                        </tr>
                  </tfoot>
                  <tbody>
                        @foreach($groups as $group)
                            <tr>
                                <td>{{$group->id}}</td>
                                <td>{{$group->title}}</td>
                                <td class="text-right">
                                    {!! Form::open(['route' => ['groups.destroy',$group->id],'method' => 'post']) !!}
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