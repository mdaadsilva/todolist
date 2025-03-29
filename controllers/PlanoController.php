<?php

require_once $_SERVER['DOCUMENT_ROOT']."/todolist/helpers/Config.php";

require_once $_SERVER['DOCUMENT_ROOT']."/todolist/models/Plano.php";

function index(){

    $planos = listarPlanos();
    return $planos;

}