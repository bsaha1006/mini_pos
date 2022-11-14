@extends('layout.main')
@section('main_content')
<h2>{{$headline}}</h2>
<div class="card shadow mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Add New {{$headline}}</h6>
      </div>
      <div class="card-body">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
              <div class="table-responsive">
                @if($mode=='edit')
                  {!! Form::model($category,['route' => ['categories.update',$category->id],'method' => 'put']) !!}
                @else
                  {!! Form::open(['route' => 'categories.store','method' => 'post']) !!}
                @endif
                  <div class="form-group">
                      <label for="categoryTitle">Category Title</label>
                      {{Form::text('title',Null,['id'=>'categoryTitle','class'=>'form-control','placeholder'=>'Product Category Title','required'])}}
                  </div>
                 @if($mode=='edit')
                    <button class="btn btn-primary" type="submit">Edit</button>
                 @else 
                    <button class="btn btn-primary" type="submit">Submit</button>
                  @endif
                {!! Form::close() !!}
              </div>
            </div>
        </div>
      </div>
  </div>
@stop