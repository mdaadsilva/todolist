<?php

require_once $_SERVER['DOCUMENT_ROOT']."/todolist/helpers/Config.php";

require_once $_SERVER['DOCUMENT_ROOT']."/todolist/models/Tarefa.php";

function index($usuarios_id){

    $tarefas = listarTarefas($usuarios_id);
    return $tarefas;

}