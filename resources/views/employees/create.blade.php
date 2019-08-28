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
    <hr>
    <div class="col-md-12">
        @include('employees._form-experiences')
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

            let data = {
                description: description,
                started: started,
                finished: finished
            }

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                type: 'post',
                url: "{{route('experiences.store')}}", 
                data: data,
                success: function(result){
                    console.log(result);
                }
            });
            
        }
    </script>
@endsection