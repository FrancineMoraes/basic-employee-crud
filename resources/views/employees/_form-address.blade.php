<h4>Endereço    <i class="fas fa-map-marked-alt"></i></h4>
<div class="form-group col-md-4">
    <label for="cep">Cep (*)</label>
    <input type="text" name="cep"  id="cep" value="{{isset($employee->address->cep) ? $employee->address->cep : '' }}" class="form-control js-cep" required>
</div>
<div class="form-group col-md-4">
    <label for="street">Rua (*)</label>
    <input type="text" name="street" id="rua" value="{{isset($employee->address->street)? $employee->address->street : '' }}" class="form-control" required>
</div>
<div class="form-group col-md-4">
    <label for="number">Número (*)</label>
    <input type="text" name="number" id="numero" value="{{isset($employee->address->number)? $employee->address->number : '' }}" class="form-control" required>
</div>
<div class="form-group col-md-4">
    <label for="district">Bairro (*)</label>
    <input type="text" name="district" id="bairro" value="{{isset($employee->address->district) ? $employee->address->district : '' }}" class="form-control" required>
</div>
<div class="form-group col-md-4">
    <label for="city">Cidade (*)</label>
    <input type="text" name="city" id="cidade" value="{{isset($employee->address->city) ? $employee->address->city : '' }}" class="form-control" required>
</div>
<div class="form-group col-md-4">
    <label for="state">Estado (*)</label>
    <input type="text" name="state" id="uf" value="{{isset($employee->address->state) ?  $employee->address->state : '' }}" class="form-control" required>
</div>