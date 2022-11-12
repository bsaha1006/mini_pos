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
 
<h2>{{$headline}}</h2>
<div class="card shadow mb-4">
      <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{$headline}}</h6>
      </div>
      <div class="card-body">
        <div class="row justify-content-md-center">
            <div class="col-md-8">
                @if($mode=='edit')
                  {!! Form::model($user,['route' =>['users.update',$user->id],'method' => 'put']) !!}
                @else
                  {!! Form::open(['route' => 'users.store','method' => 'post']) !!}
                @endif
                    <!-- Name -->
                    <div class="form-group row">
                      <label for="user" class="col-md-2 form-label text-right">Name<span class="text-danger">*</span>:</label>
                      <div class="col-md-10"> 
                          {{Form::text('name',Null,['class'=>'form-control','placeholder'=>'Enter User Name','id'=>'user'])}}
                      </div>
                    </div>
                    <!-- User Group -->
                    <div class="form-group row">
                      <label for="userGroup" class="col-md-2 form-label text-right">Group<span class="text-danger">*</span>:</label>
                      <div class="col-md-10">
                          {{Form::select('group_id',$groups,Null,['id'=>'userGroup','class'=>'form-control','placeholder'=>'Select User Group'])}} 
                      </div>
                    </div>
                    <!-- Phone -->
                    <div class="form-group row">
                      <label for="phone" class="col-md-2 form-label text-right">Phone<span class="text-danger">*</span>:</label>
                      <div class="col-md-10"> 
                        {{Form::text('phone',Null,['id'=>"phone",'class'=>'form-control','placeholder'=>'User Phone'])}}  
                      </div>
                    </div>
                    <!--Email  -->
                    <div class="form-group row">
                      <label for="email" class="col-md-2 form-label text-right">Email:</label>
                      <div class="col-md-10">
                          {{Form::text('email',Null,['id'=>'email','class'=>'form-control','placeholder'=>'User Email..'])}} 
                      </div>
                    </div>
                    <!-- Address -->
                    <div class="form-group row">
                      <label for="address" class="col-md-2 form-label text-right">Address:</label>
                      <div class="col-md-10">
                        {{Form::text('address',Null,['id'=>"address",'placeholder'=>"Address..",'class'=>'form-control'])}} 
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