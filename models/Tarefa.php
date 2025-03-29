<?php

require_once BANCO_DE_DADOS;



function listarTarefas(){
    $db = conexao();

    $sql = "SELECT * FROM tarefas";

    $stmt = $db->prepare($sql);
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


