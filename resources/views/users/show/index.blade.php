@extends('users.show.layout')
@section('show_content')
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Profile: {{$user->name}}</h6>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <tr>
                <th class="text-right">Name:</th>
                <td>{{$user->name}}</td>
            </tr>    
            <tr>
                <th class="text-right">Group:</th>
                <td>{{$user->group->title}}</td>
            </tr>    
            <tr>
                <th class="text-right">E-mail:</th>
                <td>{{$user->email}}</td>
            </tr>    
            <tr>
                <th class="text-right">Phone:</th>
                <td>{{$user->phone}}</td>
            </tr>    
            <tr>
                <th class="text-right">Address:</th>
                <td>{{$user->address}}</td>
            </tr>    
        </table>
    </div>
</div>
@stop 