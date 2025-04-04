<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/todolist/helpers/Config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/todolist/models/Tarefa.php";
include_once CABECALHO;
require_once BANCO_DE_DADOS;


if (!isset($_SESSION['usuario_id'])) {
    header('../../login/login.php');
    exit();
}

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

        header("Location: cadastro_tarefa.php");
        exit();
        
        
    }
}
?>


<main class="container">


<div class="row">
    <div class="col-sm-9 mx-auto">
        <br> <div class="mb-3">            
            <a href="/todolist/" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Voltar para a Listagem
            </a>
        </div>

        <h3 class="text-center m-4">Cadastrar Tarefa</h3>

        <form action="/todolist/tarefas/cadastro_tarefa.php" method="post" class="row g-3">
            <?php include_once "_formulario.php"; ?>
        </form>
    </div>
</div>



</main>

<?php
if (isset($_SESSION['mensagem_sucesso'])) {
    echo '<div class="modal fade show" id="sucessoModal" tabindex="-1" aria-labelledby="sucessoModalLabel" style="display:block;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">                        
                        <button type="button" class="btn-close" onclick="fecharModal()" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <i class="fas fa-check-circle" style="font-size: 50px; color: green;"></i><br><br>
                        ' . $_SESSION['mensagem_sucesso'] . '<br><br>                        
                    </div>
                </div>
            </div>
          </div>';
    unset($_SESSION['mensagem_sucesso']);
}


if (isset($_SESSION['mensagem_erro'])) {
    echo '<div class="modal fade show" id="erroModal" tabindex="-1" aria-labelledby="erroModalLabel" style="display:block;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">                        
                        <button type="button" class="btn-close" onclick="fecharModal()" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <i class="fas fa-exclamation-circle" style="font-size: 50px; color: red;"></i><br><br>
                        ' . $_SESSION['mensagem_erro'] . '
                    </div>
                </div>
            </div>
          </div>';
    unset($_SESSION['mensagem_erro']);
}
?>

<script>
    function fecharModal() {
        var modalSucesso = document.getElementById('sucessoModal');
        var modalErro = document.getElementById('erroModal');
        
        if (modalSucesso && modalSucesso.style.display !== "none") {
            modalSucesso.style.display = "none";
        }
        
        if (modalErro && modalErro.style.display !== "none") {
            modalErro.style.display = "none";
        }
    }
</script>




<?php
include_once RODAPE;

?>