<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/todolist/controllers/PlanoController.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $titulo = $_POST['titulo'];
    $valor = $_POST['valor'];
    $descricao = $_POST['descricao'];

    inserirTarefas($titulo, $descricao, $valor);

}

?>

<?php
include_once CABECALHO;

?>

<main class="container">


    <div class="row">
        <div class="col-sm-9 mx-auto">
            <h3 class="text-center m-4">Cadastrar Plano</h3>

            <form action="/todolist/admin/plano/cadastrar" method="post" class="row g-3">
        <?php include_once "_formulario.php"; ?>
        </form>

        </div>
    </div>


</main> 


<?php
include_once RODAPE;

?>