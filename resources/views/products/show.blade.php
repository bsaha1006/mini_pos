@extends('layout.main')
@section('main_content')
<div class="row clearfix mb-2">
  <div class="col-md-6 text-left">
    <a  class="btn btn-primary" href="{{route('products.index')}}"> <i class="fa fa-arrow-left"></i> Back </a>
  </div>
  <div class="col-md-6"></div>
</div>
   <!-- DataTales Example -->
   <div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">{{$product->title}}</h6>
      </div>
      <div class="card-body">
        <div class="row clearfix justify-content-md-center">
            <div class="col-md-12">
              <table class="table table-striped">
                  <tr>
                      <th class="text-right">Product ID:</th>
                      <td>{{$product->id}}</td>
                  </tr>
                  <tr>
                      <th class="text-right">Product Title:</th>
                      <td>{{$product->title}}</td>
                  </tr>
                  <tr>
                      <th class="text-right">Product Category:</th>
                      <td>{{$product->category->title}}</td>
                  </tr>
                  <tr>
                      <th class="text-right">Cost Price:</th>
                      <td>{{$product->cost_price}}</td>
                  </tr>
                  <tr>
                      <th class="text-right">Retail Price(MRP):</th>
                      <td>{{$product->price}}</td>
                  </tr>
                  <tr>
                      <th class="text-right">Description:</th>
                      <td>{{$product->description}}</td>
                  </tr>
                  <tr>
                      <th class="text-right">Last Update:</th>
                      <td>{{$product->updated_at}}</td>
                  </tr>
                  <tr>
                      <th class="text-right"></th>
                      <td class="text-right">
                        <a  class="btn btn-primary" href="{{route('products.index')}}"> <i class="fa fa-arrow-left"></i> Back </a>
                      </td>
                  </tr>
              </table>
            </div>
        </div>
      </div>
  </div>
@stop