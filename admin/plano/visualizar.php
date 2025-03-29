<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/todolist/controllers/PlanoController.php";

?>

<?php
include_once CABECALHO;

?>

<main class="container">


    <div class="row">
        <div class="col-sm-9 mx-auto">


        <h3 class="text-center mt-4">Detalhes do Plano</h3>
        <table class="table table-striped mt-3">
            <tr>
                <th whidt="180">Titulo</th>
                <td>Gratuito</td>
            </tr>

            <tr>
                <th whidt="180">Valor</th>
                <td>R$ 0,00</td>
            </tr>

            <tr>
                <th whidt="180">Descrição</th>
                <td>Lorem ipsum dolor sit amet consectetur adipisicing eli.</td>
            </tr>
        </table>

        <div class="row">
            <div class="col-12">
                <a href="/admin/plano/editar.php" class="btn btn-primary">Editar</a>
                <a href="/admin/plano" class="btn btn-light">Cancelar</a>
            </div>
        </div>


        </div>
    </div>


</main>


<?php
include_once RODAPE;

?>