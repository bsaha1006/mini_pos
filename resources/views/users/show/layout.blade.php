@extends('layout.main')
@section('main_content')
<div class="row mb-2">
      <div class="col-md-4 text-left">
          <a href="{{route('users.index')}}" class="btn btn-primary"> <i class="fa fa-arrow-left"></i> Back</a>
      </div>
      <div class="col-md-8 text-right">
        <a class="btn btn-primary" data-toggle="modal" data-target="#salesModal"> <i class="fa fa-plus"></i> New Sales</a>
        <a class="btn btn-primary" data-toggle="modal" data-target="#purchaseModal"> <i class="fa fa-plus"></i> New Purchase</a>
        <a class="btn btn-primary" data-toggle="modal" data-target="#receiptModal"> <i class="fa fa-plus"></i> New Receipt</a>
        <a class="btn btn-primary" data-toggle="modal" data-target="#paymentModal"><i class="fa fa-plus"></i> New Payment</a>
      </div>
  </div>
  <div class="row mt-5 mb-3">
    <div class="col-md-2">
        <div class="nav flex-column nav-pills">
          <a class='nav-link @if($tab_menu == "user") active @endif' href="{{route('users.show',$user->id)}}" >User Profile</a>
          <a class="nav-link @if($tab_menu =='sales') active @endif" href="{{route('users.sales',$user->id)}}" >Sales</a>
          <a class="nav-link @if($tab_menu =='purchase') active @endif" href="{{route('users.purchase',$user->id)}}" >Purchase</a>
          <a class="nav-link @if($tab_menu =='payment') active @endif" href="{{route('users.payment',$user->id)}}" >Payment</a>
          <a class="nav-link @if($tab_menu =='receipts') active @endif" href="{{route('users.receipts',$user->id)}}" >Receipts</a>
        </div>
    </div>
    <div class="col-md-10">
        @yield('show_content')
    </div>
  </div>
  <!-- Modal for Receipts -->
<div class="modal fade" id="receiptModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      {!! Form::open(['route' => ['users.saveReceipts',$user->id],'method'=>'post']) !!}
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Make a Receipt</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label for="first_name">Date</label>
              {{ Form::date('date',  \Carbon\Carbon::now(),['class' => 'form-control','placeholder'=>'Pick a date','id'=>'date'])}}
            </div>
            <div class="form-group">
              <label for="amount">Amount</label>
              {{ Form::text('amount', Null,['class' => 'form-control','placeholder'=>'Amount','id'=>'amount','required']) }}
            </div>
            <div class="form-group">
              <label for="note">Note</label>
              {{ Form::textarea('note', Null,['class' => 'form-control','placeholder'=>'Note','rows'=>'3','id'=>'note']) }}
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Make Receipt</button>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
  <!-- Modal for Payments -->
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      {!! Form::open(['route' => ['users.storePayment',$user->id],'method'=>'post']) !!}
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Make a Payment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <label for="first_name">Date</label>
              {{ Form::date('date',  \Carbon\Carbon::now(),['class' => 'form-control','placeholder'=>'Pick a date','id'=>'date'])}}
            </div>
            <div class="form-group">
              <label for="amount">Amount</label>
              {{ Form::text('amount', Null,['class' => 'form-control','placeholder'=>'Amount','id'=>'amount','required']) }}
            </div>
            <div class="form-group">
              <label for="note">Note</label>
              {{ Form::textarea('note', Null,['class' => 'form-control','placeholder'=>'Note','rows'=>'3','id'=>'note']) }}
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Make Payment</button>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
</div>
@stop 