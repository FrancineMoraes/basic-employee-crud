<h4>Endereço    <i class="fas fa-map-marked-alt"></i></h4>
<div class="form-group col-md-4">
    <label for="cep">Cep</label>
    <input type="text" name="cep" value="{{$employee->address->cep}}" class="form-control">
</div>
<div class="form-group col-md-4">
    <label for="street">Rua</label>
    <input type="text" name="street" value="{{$employee->address->street}}" class="form-control">
</div>
<div class="form-group col-md-4">
    <label for="number">Número</label>
    <input type="text" name="number" value="{{$employee->address->number}}" class="form-control">
</div>
<div class="form-group col-md-4">
    <label for="district">Bairro</label>
    <input type="text" name="district" value="{{$employee->address->district}}" class="form-control">
</div>
<div class="form-group col-md-4">
    <label for="city">Cidade</label>
    <input type="text" name="city" value="{{$employee->address->city}}" class="form-control">
</div>
<div class="form-group col-md-4">
    <label for="state">Estado</label>
    <input type="text" name="state" value="{{$employee->address->state}}" class="form-control">
</div>