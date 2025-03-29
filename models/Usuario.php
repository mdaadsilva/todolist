<?php

require_once BANCO_DE_DADOS;

function inserirUsuario($nome, $email, $senha) {
    try {
        $db = conexao();        

        $stmt = $db->prepare("INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)");
        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":senha", $senha);

        if ($stmt->execute()) {
            return true; 
        } else {
            return false;
        }
    } catch (PDOException $e) {
        error_log("Erro ao inserir usuário: " . $e->getMessage()); // Log de erro
        return false;
    }
}

function verificarEmailExistente($email) {
    $db = conexao(); 
    
    $sql = "SELECT COUNT(*) FROM usuarios WHERE email = :email";
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    
    $resultado = $stmt->fetchColumn();
    
    return $resultado > 0; 
}

?>