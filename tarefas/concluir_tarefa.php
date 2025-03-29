<?php
require_once $_SERVER['DOCUMENT_ROOT']."/todolist/helpers/Config.php";
require_once BANCO_DE_DADOS;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $db = conexao();
    
    $query = "UPDATE tarefas SET status = '1' WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);    

    if ($stmt->execute()) {
        echo "<script>alert('Tarefa concluída com sucesso!'); window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Erro ao concluir tarefa!'); history.back();</script>";
    }
}

?>
