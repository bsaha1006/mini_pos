@extends('users.show.layout')
@section('show_content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Purchase Invices of {{$user->name}}</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Challan No.</th>
                        <th>Buyer</th>
                        <th>Amount</th>
                        <th class="text-right">Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Date</th>
                        <th>Challan No.</th>
                        <th>Sealer</th>
                        <th>Amount</th>
                        <th class="text-right">Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($user->purchases as $purchase)
                        <tr>
                            <td>{{$purchase->date}}</td>
                            <td>{{$purchase->challan_no}}</td>
                            <td>{{$purchase->admin->name}}</td>
                            <td>{{$purchase->id}}</td>
                            <td class="text-right">
                                {!! Form::open(['route' => ['users.destroy',$user->id],'method' => 'post']) !!}
                                    <a href="{{route('users.show',$user->id)}}" class="btn btn-primary" > <i class="fa fa-eye"></i></a>
                                    <a href="{{route('users.edit',$user->id)}}" class="btn btn-primary" > <i class="fa fa-edit"></i></a>
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