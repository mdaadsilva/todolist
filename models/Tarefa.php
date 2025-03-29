<?php

require_once BANCO_DE_DADOS;


function listarTarefas($usuarios_id){
    $db = conexao();

    $sql = "SELECT * FROM tarefas WHERE usuarios_id = :usuarios_id";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':usuarios_id', $usuarios_id, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}

function inserirTarefas($tarefa, $descricao, $prioridade, $datavenc){
    $db = conexao();

    $stmt = $db->prepare("INSERT INTO tarefas(tarefa, descricao, prioridade, datavenc) values (:tarefa,:descricao,:prioridade, :datavenc)");
    $stmt -> bindParam(":tarefa", $tarefa);
    $stmt -> bindParam(":descricao", $descricao);
    $stmt -> bindParam(":prioridade", $prioridade);
    $stmt -> bindParam(":datavenc", $datavenc);
    

    if($stmt->execute()){
        return 1;
    }
}