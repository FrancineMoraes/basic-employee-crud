@extends('app')

@section('content')
    
<div class="col-md-12">
    <h3>Funcionário    <i class="fas fa-user"></i></h3>
    <br>
</div>
<form action="{{route('employees.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="col-md-12">
        @include('employees._form')
    </div>
    <div class="col-md-12">
        @include('employees._form-address')    
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-success">Salvar</button>
    </div>
</form>
@endsection