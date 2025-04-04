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

    $usuarios_id = $_SESSION['usuario_id'];

    $stmt = $db->prepare("INSERT INTO tarefas(tarefa, descricao, prioridade, datavenc, usuarios_id) values (:tarefa,:descricao,:prioridade, :datavenc, :usuario_id)");
    $stmt -> bindParam(":tarefa", $tarefa);
    $stmt -> bindParam(":descricao", $descricao);
    $stmt -> bindParam(":prioridade", $prioridade);
    $stmt -> bindParam(":datavenc", $datavenc);
    $stmt -> bindParam(":usuario_id", $usuarios_id);
       

    if($stmt->execute()){
        return 1;
    }
}

function atualizarTarefa($tarefa, $descricao, $prioridade, $datavenc, $id){
    $db = conexao();

    $stmt = $db->prepare("UPDATE tarefas SET tarefa = :tarefa, descricao = :descricao, prioridade = :prioridade, datavenc = :datavenc WHERE id = :tarefas_id");

    $stmt -> bindParam(":tarefa", $tarefa);
    $stmt -> bindParam(":descricao", $descricao);
    $stmt -> bindParam(":prioridade", $prioridade);
    $stmt -> bindParam(":datavenc", $datavenc);
    $stmt -> bindParam(":tarefas_id", $id);
    if($stmt->execute()){
        return 1;
    }else{
        return 0;
    }
}

function buscarTarefaPorId($id) {
    $db = conexao();
    $stmt = $db->prepare("SELECT * FROM tarefas WHERE id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function tarefasVencemHoje($usuarios_id) {
    $db = conexao();
    $hoje = date('Y-m-d');    
    
    $stmt = $db->prepare("SELECT * FROM tarefas WHERE usuarios_id = :usuarios_id AND datavenc = :hoje AND status = 0");
    $stmt->bindParam(':usuarios_id', $usuarios_id);
    $stmt->bindParam(':hoje', $hoje);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}