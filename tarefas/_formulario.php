<div class="col-12 col-md-8">
    <label class="form-label" for="tarefa">Tarefa</label>
    <input type="text" name="tarefa" class="form-control" id="tarefa" 
        value="<?= isset($tarefa) ? htmlspecialchars($tarefa['tarefa']) : '' ?>" required>
</div>

<div class="col-12 col-md-8">
    <label class="form-label" for="prioridade">Prioridade</label>
    <select name="prioridade" class="form-control" id="prioridade" required>
        <option value="alta" <?= (isset($tarefa) && $tarefa['prioridade'] == 'alta') ? 'selected' : '' ?>>Alta</option>
        <option value="media" <?= (isset($tarefa) && $tarefa['prioridade'] == 'media') ? 'selected' : '' ?>>Média</option>
        <option value="baixa" <?= (isset($tarefa) && $tarefa['prioridade'] == 'baixa') ? 'selected' : '' ?>>Baixa</option>
    </select>
</div>

<div class="col-12 col-md-8">
    <label class="form-label" for="data_vencimento">Data de Vencimento</label>
    <input type="date" name="data_vencimento" class="form-control" id="data_vencimento" 
    value="<?= isset($tarefa) ? date('Y-m-d', strtotime($tarefa['datavenc'])) : '' ?>" required>

</div>

<div class="col-12">
    <label class="form-label" for="descricao">Descrição</label>
    <input type="text" name="descricao" class="form-control" id="descricao" 
        value="<?= isset($tarefa) ? htmlspecialchars($tarefa['descricao']) : '' ?>" required>
</div>

<?php if (isset($tarefa)): ?>
    <input type="hidden" name="id" value="<?= $tarefa['id'] ?>">
<?php endif; ?>

<div class="col-12">
    <button type="submit" class="btn btn-primary">Salvar</button>
</div>
