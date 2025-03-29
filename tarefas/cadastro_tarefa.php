<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/todolist/helpers/Config.php";
include_once CABECALHO;

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
include_once RODAPE;

?>