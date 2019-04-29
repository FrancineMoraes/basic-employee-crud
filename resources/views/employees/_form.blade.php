<div class="form-group col-md-4">
    <label for="name">Nome</label>
    <input type="text" name="name" value="{{isset($employee->name) ? $employee->name : '' }}" class="form-control">
</div>
<div class="form-group col-md-4">
    <label for="email">Email</label>
    <input type="email" name="email" value="{{isset($employee->email) ? $employee->email : ''}}" class="form-control">
</div>
<div class="form-group col-md-4">
    <label for="phone">Telefone</label>
    <input type="text" name="phone" value="{{isset($employee->phone) ? $employee->phone : ''}}" class="form-control">
</div>
<div class="form-group col-md-4">
    @isset($employee->image->path)
        <img src="{{url('storage/'.$employee->image->path)}}" alt="">
    @endisset
    <input type="file" name="image">
</div>
<hr>
<br>