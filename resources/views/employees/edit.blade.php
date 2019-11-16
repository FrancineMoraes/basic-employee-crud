@extends('app')

@section('content')

<div class="col-md-12">
    <h3>Funcionário    <i class="fas fa-user"></i></h3>
    <br>
</div>
<form action="{{route('employees.update', $employee->id)}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="col-md-12">
        @include('employees._form')
    </div>
    <hr>
    <div class="col-md-12">
        @include('employees._form-experiences')
    </div>
    <hr>
    <div class="col-md-12 experiences">
        <h3>Lista de experiencias</h3>
        @foreach($employee->experiences as $experience)
            <li>{{$experience->description}} - {{$experience->started}} até {{($experience->finished ? $experience->finished : 'hoje')}}</li>
        @endforeach
    </div>
    <hr>
    <div class="col-md-12">
        @include('employees._form-address')
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-success">Salvar</button>
    </div>
</form>
@endsection

@section('script')
    <script>
        $( document ).ready(function() {
            $('#div-finished').hide();

            $('#job').on('change', function() {
                if(this.value == "true") {
                    $('#div-finished').show();
                } else {
                    $('#div-finished').hide();
                }
            });
        });

        function createExperience() {
            let description = $('#experience').val();
            let started = $('#started').val();
            let finished = $('#finished').val();
            let employee_id = '{{$employee->id}}';

            let data = {
                description: description,
                started: started,
                finished: finished,
                employee_id: employee_id
            };

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                type: 'post',
                url: "{{route('experiences.store')}}",
                data: data,
                success: (result) => {
                    $('.experiences').html("");
                    $('.experiences').append('<h3>Lista de experiências</h3>')

                    data = Object.values(result);
                    for(let i = 0; i < data.length; i++) {
                        const finished = (data[i].finished === null ? 'hoje' : data[i].finished);
                        $('.experiences').append(`<li>${data[i].description} - ${data[i].started} até ${finished}</li>`)
                    }
                }
            });

        }
    </script>
@endsection
