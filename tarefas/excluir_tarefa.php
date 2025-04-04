<?php
require_once $_SERVER['DOCUMENT_ROOT']."/todolist/helpers/Config.php";
require_once BANCO_DE_DADOS;

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $db = conexao();
    
    $query = "DELETE FROM tarefas WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);    

    if ($stmt->execute()) {
        echo "<script>alert('Tarefa excluída com sucesso!'); window.location.href='/todolist/index.php';</script>";
    } else {
        echo "<script>alert('Erro ao excluir tarefa!'); history.back();</script>";
    }
}

?>
