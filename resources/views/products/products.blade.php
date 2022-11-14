@extends('layout.main')
@section('main_content')
<div class="row mb-3">
      <div class="col-md-6"></div>
      <div class="col-md-6 text-right">
          <a href="{{route('products.create')}}" class="btn btn-primary"> <i class="fa fa-plus"></i> New Product</a>
      </div>
  </div>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Product List</h6>
      </div>
      <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th>Id</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Price</th>
                          <th class="text-right">Action</th>
                      </tr>
                  </thead>
                  <tfoot>
                        <tr>
                          <th>Id</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Price</th>
                            <th class="text-right">Action</th>
                        </tr>
                  </tfoot>
                  <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->id}}</td>
                                <td>{{$product->title}}</td>
                                <td>{{$product->category->title}}</td>
                                <td>{{$product->price}}</td>
                                <td class="text-right">
                                    {!! Form::open(['route' => ['products.destroy',$product->id],'method' => 'post']) !!}
                                        <a href="{{route('products.show',$product->id)}}" class="btn btn-primary" > <i class="fa fa-eye"></i></a>
                                        <a href="{{route('products.edit',$product->id)}}" class="btn btn-primary" > <i class="fa fa-edit"></i></a>
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