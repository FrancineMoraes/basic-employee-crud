@extends('app')

@section('content')
<div class="col-md-12">
    <h3>Funcionário</h3>
</div>
<div class="col-md-12">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col">Telefone</th>
                <th scope="col">Rua</th>
                <th scope="col">Nº</th>
                <th scope="col">Bairro</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($employees as $employee)
                <tr>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->phone}}</td>
                    <td>{{$employee->address->street}}</td>
                    <td>{{$employee->address->number}}</td>
                    <td>{{$employee->address->district}}</td>
                    <td>
                        <a href="{{route('employees.edit', $employee->id)}}"><button class="btn btn-success"><i class="far fa-edit text-white"></i></button></a>
                        <a href="{{route('employees.show', $employee->id)}}"><button class="btn btn-primary"><i class="fas fa-eye"></i></button></a>
                        <button class="btn btn-danger bt-del" data-title="Funcionário" data-route="{{route('employees.destroy', $employee->id)}}" data-item="{{$employee->name}}"><i class="fas fa-trash-alt"></i></button>
                    </td>
                </tr>
            @empty
                
            @endforelse
        </tbody>
    </table>
</div>
@include('components.modal')
@endsection

@section('script')
<script>
    $('.bt-del').click(function (){
        var title = $(this).data('title');
        var route = $(this).data('route');
        var item = $(this).data('item');

        $.ajax({
            type: 'GET',
            url: "{{route('modal.delete')}}",
            data: {title:title, item:item, route:route},
            success: function (data){
            $('#myModal').modal();
                $('.conteudo-modal').html(data);
            }
        });
    });
</script>
@endsection