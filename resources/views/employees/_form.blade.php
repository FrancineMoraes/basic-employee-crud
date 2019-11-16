<div class="form-group col-md-6">
    <label for="name">Nome (*)</label>
    <input type="text" name="name" value="{{isset($employee->name) ? $employee->name : '' }}" class="form-control" required>
</div>
<div class="form-group col-md-6">
    <label for="email">Email (*)</label>
    <input type="email" name="email" value="{{isset($employee->email) ? $employee->email : ''}}" class="form-control" required>
</div>
<div class="form-group col-md-6">
    <label for="phone">Telefone (*)</label>
    <input type="text" name="phone" value="{{isset($employee->phone) ? $employee->phone : ''}}" class="form-control js-phone" required>
</div>
<div class="form-group col-md-6">
    <label for="area">Área (*)</label>
    <input type="text" name="area" value="{{isset($employee->area) ? $employee->area : ''}}" class="form-control" required>
</div>
<div class="form-group col-md-6">
    <label for="birth_date">Data de nascimento (*)</label>
    <input type="date" name="bith_date" value="{{isset($employee->birth_date) ? $employee->birth_date : ''}}" class="form-control" required>
</div>
<div class="form-group col-md-6">
    @isset($employee->image->path)
        <p>Imagem inserida: </p>
        <img src="{{url('storage/'.$employee->image->path)}}"  alt="{{$employee->name}}" style="width: 200px; height:150px;">
        <br><br>
    @endisset
    <label for="image">Imagem: (*)</label>
    <input type="file" name="image">
</div>