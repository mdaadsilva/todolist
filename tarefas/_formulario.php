<div class="col-12 col-md-8">
    <label class="form-label" for="tarefa">Tarefa</label>
    <input type="text" name="tarefa" class="form-control" id="tarefa"  required value="<?= htmlspecialchars($tarefa['titulo'])?>">
</div>

<div class="col-12 col-md-8">
    <label class="form-label" for="prioridade">Prioridade</label>
    <select name="prioridade" class="form-control" id="prioridade" required >
        <option value="alta">Alta</option>
        <option value="media">Média</option>
        <option value="baixa">Baixa</option>
    </select>
</div>

<div class="col-12 col-md-8">
    <label class="form-label" for="data_vencimento">Data de Vencimento</label>
    <input type="date" name="data_vencimento" class="form-control" id="data_vencimento" required >
</div>

<div class="col-12">
    <label class="form-label" for="descricao">Descrição</label>
    <input type="text" name="descricao" class="form-control" id="descricao" required>
</div>

<div class="col-12">
    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="/todolist/admin/plano/" class="btn btn-light">Cancelar</a>
</div>