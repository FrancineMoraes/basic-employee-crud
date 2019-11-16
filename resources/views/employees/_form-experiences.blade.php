<h4>Experiências    <i class="fas fa-file"></i></h4>
<div class="col-md-6">
    <div class="form-group">
        <label for="form-control">Experiência</label>
        <input class="form-control" type="text" id="experience">
    </div>
    <div class="form-group">
        <label for="form-control">Data de admissão</label>
        <input class="form-control" type="date" id="started">
    </div>
    <div class="form-group">
        <label for="form-control">Você está nesse emprego atualmente?</label>
        <select id="job" class="form-control">
            <option value="">Sim</option>
            <option value="true">Não</option>
        </select>
    </div>
    <div class="form-group" id="div-finished">
        <label for="form-control">Data de demissão</label>
        <input class="form-control" type="date" id="finished">
    </div>
    <div class="form-group">
        <button onClick="createExperience()" type="button" class="btn btn-primary">OK</button>
    </div>
</div>