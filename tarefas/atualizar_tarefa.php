<?php
require_once $_SERVER['DOCUMENT_ROOT']."/todolist/controllers/TarefaController.php";

// Adapta nome do campo
$_POST['datavenc'] = $_POST['data_vencimento'];
unset($_POST['data_vencimento']);

$retorno = atualizar($_POST);

if ($retorno == 1) {
    header("Location: /todolist/?editado=1");
    exit;
} else {
    echo "Erro ao atualizar tarefa.";
}
