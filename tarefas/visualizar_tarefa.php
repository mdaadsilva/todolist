<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/todolist/controllers/TarefaController.php";

?>

<?php
include_once CABECALHO;

?>

<main class="container">


    <div class="row">
        <div class="col-sm-9 mx-auto">


            <h3 class="text-center mt-4">Detalhes da Tarefa</h3>
            <table class="table table-striped mt-3">
                <tr>
                    <th width="180">Tarefa</th>
                    <td>Exemplo de Tarefa</td>
                </tr>

                <tr>
                    <th width="180">Descrição</th>
                    <td>Descrição da tarefa que precisa ser feita para completar o objetivo.</td>
                </tr>

                <tr>
                    <th width="180">Prioridade</th>
                    <td>Alta</td>
                </tr>

                <tr>
                    <th width="180">Data de Vencimento</th>
                    <td>2025-03-29</td>
                </tr>
            </table>


            <div class="row">
                <div class="col-12">
                    <a href="/tarefas/editar_tarefa.php" class="btn btn-primary">Editar</a>
                    <a href="todolist/tarefas" class="btn btn-light">Cancelar</a>
                </div>
            </div>


        </div>
    </div>


</main>


<?php
include_once RODAPE;

?>