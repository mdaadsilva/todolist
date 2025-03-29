<?php

require_once $_SERVER['DOCUMENT_ROOT']."/todolist/helpers/Config.php";

require_once $_SERVER['DOCUMENT_ROOT']."/todolist/models/Tarefa.php";

function index(){

    $tarefas = listarTarefas();
    return $tarefas;

}