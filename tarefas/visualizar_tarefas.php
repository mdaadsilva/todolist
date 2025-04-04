<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/todolist/helpers/Config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/todolist/controllers/TarefaController.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/todolist/models/Tarefa.php";
include_once CABECALHO;
require_once BANCO_DE_DADOS;

$tarefa = visualizar($_GET['id']);
?>

<div class="row">
    <div class="col-sm-9 mx-auto">
        <br>
        <div class="mb-3">
            <a href="/todolist/" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Voltar para a Listagem
            </a>
        </div>

        <h3 class="text-center m-4">Editar Tarefa</h3>

        <form action="/todolist/tarefas/atualizar_tarefa.php" method="post" class="row g-3">
            <?php include_once "_formulario.php"; ?>
        </form>
    </div>
</div>
