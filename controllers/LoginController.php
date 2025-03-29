<?php

require_once $_SERVER['DOCUMENT_ROOT']."/todolist/helpers/Config.php";

require_once $_SERVER['DOCUMENT_ROOT']."/todolist/models/Usuario.php";

function login() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $usuario = autenticar($email, $senha);
        
        if ($usuario) {
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['usuario_email'] = $usuario['email'];
            header("Location: ../index.php");
        } else {
            echo "Usuário ou senha incorretos.";
        }
    }
}





?>