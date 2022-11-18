@extends('layout.primary')
@section('primary_content')
<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
        <div> 
          @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                      @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                      @endforeach
                </ul>
            </div>
          @endif
        </div>
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    {!! Form::open(['route' => 'login.auth']) !!}
                                        <div class="form-group">
                                          {{ Form::text('email',Null, ['class'=>'form-control','placeholder'=>'Enter Email','id'=>'email']) }}
                                        </div>
                                        <div class="form-group">
                                          {{ Form::password('password', ['class'=>'form-control','placeholder'=>'Enter Email','id'=>'email']) }}
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@stop