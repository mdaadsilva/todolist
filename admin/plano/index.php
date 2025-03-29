<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/todolist/controllers/PlanoController.php";

    $planos = index();

    

?>

<?php
include_once CABECALHO;

?>

<main class="container">


    <div class="row">
        <div class="col-sm-9 mx-auto">

        <h3 class="text-center ">Lista de Planos</h3>

        <div class="row">
            <div class="col-12 text-end">
                <a href="/todolist/admin/plano/cadastrar.php" class="btn btn-primary"><i class="fas fa-plus"></i>Adicionar</a>
            </div>
        </div>

        <table class="table table-striped mt-3">

            <thead>
                <tr>
                    <th>#</th>
                    <th>Titulo</th>
                    <th>Valor</th>
                    <th width="140">Ação</th>
                </tr>
            </thead>

            <body>


            <?php foreach($planos as $plan):?>
                <tr>
                    <td><?=$plan['id']?></td>
                    <td><?=$plan['titulo']?></td>
                    <td><?=$plan['valor']?></td>
                    <td>
                        <a href="/admin/plano/visualizar/?id=<?=$plan['id']?>" class="btn btn-sm btn-light"><i class="fas fa-eye"></i></a>
                        <a href="/admin/plano/visualizar/?id=<?=$plan['id']?>" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                        <a href="/admin/plano/visualizar/?id=<?=$plan['id']?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>
                <?php endforeach;?>


            </body>

        </table>



        </div>
    </div>


</main>


<?php
include_once RODAPE;

?>