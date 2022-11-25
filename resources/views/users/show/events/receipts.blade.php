@extends('users.show.layout')
@section('show_content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Receipts Vouchers of {{$user->name}}</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Received By</th>
                        <th>Amount</th>
                        <th>Note</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Date</th>
                        <th>Received By</th>
                        <th>Amount</th>
                        <th>Note</th>
                        <th class="text-right">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($user->receipts as $receipt)
                        <tr>
                            <td>{{$receipt->id}}</td>
                            <td>{{$receipt->date}}</td>
                            <td>{{$receipt->admin_id}}</td>
                            <td>{{$receipt->amount}}</td>
                            <td>{{$receipt->note}}</td>
                            <td class="text-right">
                                {!! Form::open(['route' => ['users.destroyReceipts',[$user->id,$receipt->id]],'method' => 'post']) !!}
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