@extends('users.show.layout')
@section('show_content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Payment Vouchers of {{$user->name}}</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Paid By</th>
                        <th>Amount</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Paid By</th>
                        <th>Amount</th>
                        <th class="text-right">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($user->payments as $payment)
                        <tr>
                            <td>{{$payment->id}}</td>
                            <td>{{$payment->date}}</td>
                            <td>{{$payment->admin_id}}</td>
                            <td>{{$payment->amount}}</td>
                            <td>{{$payment->note}}</td>
                            <td class="text-right">
                                {!! Form::open(['route' => ['users.destroyPayment',[$user->id,$payment->id]],'method' => 'post']) !!}
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