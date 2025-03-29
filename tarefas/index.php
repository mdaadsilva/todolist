<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/todolist/controllers/TarefaController.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/todolist/helpers/Config.php";
include_once CABECALHO;

session_start();

if (!isset($_SESSION['usuario_id'])) {
    header('Location: ../../login/login.php');
    exit();
} else {
    $usuarios_id = $_SESSION['usuario_id'];
}

$tarefas = index($usuarios_id);

?>

<main>
    <div class="row">
        <div class="col-sm-9 mx-auto">
            <br/>
            <h3 class="text-center">Lista de Tarefas</h3>

            <!-- Campos de Filtro -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <input type="text" id="filtroTitulo" class="form-control" placeholder="Filtrar por título">
                </div>
                <div class="col-md-3">
                    <select id="filtroStatus" class="form-control">
                        <option value="">Todos</option>
                        <option value="1">Concluído</option>
                        <option value="0">Pendente</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select id="filtroPrioridade" class="form-control">
                        <option value="">Todas as Prioridades</option>
                        <option value="alta">Alta</option>
                        <option value="media">Média</option>
                        <option value="baixa">Baixa</option>
                    </select>
                </div>
            </div>

            <!-- Tabela de Tarefas -->
            <table class="table table-striped mt-3">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Data de Vencimento</th>
                        <th>Prioridade</th>                        
                        <th width="140">Ação</th>
                    </tr>
                </thead>
                <tbody id="tabelaTarefas">
                    <?php foreach ($tarefas as $tarefasad): ?>                        
                        <tr class="<?= $tarefasad['status'] == 1 ? 'table-success' : '' ?>" 
                            data-titulo="<?= strtolower($tarefasad['tarefa']) ?>" 
                            data-status="<?= $tarefasad['status'] ?>" 
                            data-prioridade="<?= strtolower($tarefasad['prioridade']) ?>">
                            <td><?= $tarefasad['id'] ?></td>
                            <td><?= $tarefasad['tarefa'] ?></td>
                            <td><?= $tarefasad['descricao'] ?></td>
                            <td><?= date('d/m/Y', strtotime($tarefasad['datavenc'])) ?></td>
                            <td><?= strtoupper($tarefasad['prioridade']) ?></td>
                            <td>                                
                                <a href="tarefas/visualizar_tarefas/?id=<?= $tarefasad['id'] ?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>                                
                                <a href="#" class="btn btn-sm btn-danger" onclick="abrirDeleteModal(<?= $tarefasad['id'] ?>)"><i class="fas fa-trash"></i></a>
                                <a href="#" class="btn btn-sm btn-success" onclick="abrirModal(<?= $tarefasad['id'] ?>)"><i class="fas fa-check"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- Modal de Confirmação -->
<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Confirmar Conclusão</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar" onclick="fecharModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja marcar esta tarefa como concluída?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="fecharModal()">Cancelar</button>
                <a id="confirmButton" href="#" class="btn btn-success">Sim, Concluir</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Confirmação para Exclusão -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Confirmar Exclusão</h5>
                <button type="button" class="close" aria-label="Fechar" onclick="fecharDeleteModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja excluir esta tarefa? Essa ação não pode ser desfeita.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="fecharDeleteModal()">Cancelar</button>
                <a id="confirmDeleteButton" href="#" class="btn btn-danger">Sim, Excluir</a>
            </div>
        </div>
    </div>
</div>



<script>
    function abrirModal(id) {        
        document.getElementById('confirmButton').href = 'concluir_tarefa.php?id=' + id;        
        document.getElementById('confirmModal').style.display = 'block';
        document.getElementById('confirmModal').classList.add('show');
    }

    function fecharModal() {        
        document.getElementById('confirmModal').style.display = 'none';
        document.getElementById('confirmModal').classList.remove('show');
    }

    function abrirDeleteModal(id) {
        
        document.getElementById('confirmDeleteButton').href = 'excluir_tarefa.php?id=' + id;        
        document.getElementById('deleteModal').style.display = 'block';
        document.getElementById('deleteModal').classList.add('show');
    }

    function fecharDeleteModal() {        
        document.getElementById('deleteModal').style.display = 'none';
        document.getElementById('deleteModal').classList.remove('show');
    }

    document.addEventListener("DOMContentLoaded", function () {
    const filtroTitulo = document.getElementById("filtroTitulo");
    const filtroStatus = document.getElementById("filtroStatus");
    const filtroPrioridade = document.getElementById("filtroPrioridade");
    const tabela = document.getElementById("tabelaTarefas").getElementsByTagName("tr");

    function filtrarTarefas() {
        const titulo = filtroTitulo.value.toLowerCase();
        const status = filtroStatus.value;
        const prioridade = filtroPrioridade.value;

        for (let i = 0; i < tabela.length; i++) {
            const row = tabela[i];
            const tituloTarefa = row.getAttribute("data-titulo");
            const statusTarefa = row.getAttribute("data-status");
            const prioridadeTarefa = row.getAttribute("data-prioridade");

            let exibir = true;

            if (titulo && !tituloTarefa.includes(titulo)) {
                exibir = false;
            }
            if (status && statusTarefa !== status) {
                exibir = false;
            }
            if (prioridade && prioridadeTarefa !== prioridade) {
                exibir = false;
            }

            row.style.display = exibir ? "" : "none";
        }
    }

    filtroTitulo.addEventListener("keyup", filtrarTarefas);
    filtroStatus.addEventListener("change", filtrarTarefas);
    filtroPrioridade.addEventListener("change", filtrarTarefas);
});
</script>

<?php
include_once RODAPE;