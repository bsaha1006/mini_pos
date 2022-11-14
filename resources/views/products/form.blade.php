@extends('layout.main')
@section('main_content')

  @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach 
        </ul>
    </div>
  @endif
 
<h2>{{$mode}} {{$headline}}</h2>
<div class="card shadow mb-4">
      <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{$headline}} ({{$mode}})</h6>
      </div>
      <div class="card-body">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                @if($mode=='edit')
                  {!! Form::model($product,['route' =>['products.update',$product->id],'method' => 'put']) !!}
                @else
                  {!! Form::open(['route' => 'products.store','method' => 'post']) !!}
                @endif
                    <!-- Title -->
                    <div class="form-group row">
                      <label for="productTitle" class="col-md-2 form-label text-right">Title<span class="text-danger">*</span>:</label>
                      <div class="col-md-10"> 
                          {{Form::text('title',Null,['class'=>'form-control','placeholder'=>'Enter Product Title','id'=>'productTitle'])}}
                      </div>
                    </div>
                    <!-- Product Category -->
                    <div class="form-group row">
                      <label for="productCategory" class="col-md-2 form-label text-right">Category<span class="text-danger">*</span>:</label>
                      <div class="col-md-10">
                          {{Form::select('category_id',$categories,Null,['id'=>'productCategory','class'=>'form-control','placeholder'=>'Select Product Category'])}} 
                      </div>
                    </div>
                    <!-- Description -->
                    <div class="form-group row">
                      <label for="productDescription" class="col-md-2 form-label text-right">Description<span class="text-danger">*</span>:</label>
                      <div class="col-md-10"> 
                        {{Form::textarea('description',Null,['id'=>"productDescription",'class'=>'form-control','placeholder'=>'Product Description'])}}  
                      </div>
                    </div>
                    <!--Costing  -->
                    <div class="form-group row">
                      <label for="costPrice" class="col-md-2 form-label text-right">Cost Price<span class="text-danger">*</span>:</label>
                      <div class="col-md-10">
                          {{Form::text('cost_price',Null,['id'=>'costPrice','class'=>'form-control','placeholder'=>'Cost Price'])}} 
                      </div>
                    </div>
                    <!-- Retail Price -->
                    <div class="form-group row">
                      <label for="maxRetailPrice" class="col-md-2 form-label text-right">MRP:</label>
                      <div class="col-md-10">
                        {{Form::text('price',Null,['id'=>"maxRetailPrice",'placeholder'=>"Maximum Retail Price",'class'=>'form-control'])}} 
                      </div>
                    </div>
                    <!-- Submit -->
                    <div class="text-right">
                      @if($mode=='edit')
                        <button class="btn btn-primary" type="submit">Update</button>
                      @else
                          <button class="btn btn-primary" type="submit">Submit</button>
                      @endif 
                    </div> 
                  {!! Form::close() !!}
            </div>
        </div>
      </div>
  </div>
@stop