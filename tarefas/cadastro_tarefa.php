<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/todolist/helpers/Config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/todolist/models/Tarefa.php";
include_once CABECALHO;
require_once BANCO_DE_DADOS;


if (!isset($_SESSION['usuario_id'])) {
    header('../../login/login.php');
    exit();
}
?>

<main class="container">


    <div class="row">
        <div class="col-sm-9 mx-auto">
            <h3 class="text-center m-4">Cadastrar Tarefa</h3>

            <form action="/todolist/tarefas/cadastro_tarefa.php" method="post" class="row g-3">
        <?php include_once "_formulario.php"; ?>
        </form>

        </div>
    </div>


</main>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $db = conexao();

    $tarefa = $_POST['tarefa'];
    $descricao = $_POST['descricao'];
    $prioridade = $_POST['prioridade'];
    $data_vencimento = $_POST['data_vencimento'];


    if (!empty($tarefa) && !empty($descricao) && !empty($prioridade) && !empty($data_vencimento)) {
       $resultado = inserirTarefas($tarefa, $descricao, $prioridade, $data_vencimento);

       if($resultado) {
            $_SESSION['mensagem_sucesso'] = "Tarefa cadastrada com sucesso!";
        } else {
            $_SESSION['mensagem_erro'] = "Erro ao cadastrar tarefa!";
        }
        
        
    }
}
?>


<?php
include_once RODAPE;

?>