<?php

require_once BANCO_DE_DADOS;



function listarPlanos(){
    $db = conexao();

    $sql = "SELECT * FROM planos";

    $stmt = $db->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}

function inserirPlanos($titulo, $valor, $descricao){
    $db = conexao();

    $stmt = $db->prepare("INSERT INTO planos(titulo, descricao, valor) values (:titulo,:descricao,:valor)");
    $stmt -> bindParam(":titulo", $titulo);
    $stmt -> bindParam(":descricao", $descricao);
    $stmt -> bindParam(":valor", $valor);
    

    if($stmt->execute()){
        return 1;
    }


}


