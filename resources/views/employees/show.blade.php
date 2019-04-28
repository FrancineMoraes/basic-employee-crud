@extends('app')

@section('content')
    <div class="col-md-12">
        <h2>Funcionário        <i class="fas fa-user"></i></h2>
        <hr>
        <img src="{{url($employee->image->path)}}" alt="">
        <h4>{{$employee->name}}</h4>
        <h4>{{$employee->email}}</h4>
        <h4>{{$employee->phone}}</h4>
        <hr>
        <h2>Endereço</h2>
        <hr>
        <h4>{{$employee->address->street}}, {{$employee->address->number}} - {{$employee->address->district}} - {{$employee->address->city}}/{{$employee->address->state}}</h4>
    </div>
@endsection