<?php
require_once "../helpers/Config.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/todolist/controllers/LoginController.php";
include_once CABECALHO;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">   
    <title>Tela de login</title>
</head>
<body class="body">
    <div class="div">
    <form method="POST" action="login.php">
    <h1 class="centralizado">LOGIN</h1>
    <input type="text" name="email" placeholder="E-mail" class="login-input" required>
    <br><br>
    <input type="password" name="senha" placeholder="Senha" class="login-input" required>
    <br><br>
    <button class="button">Entrar</button>
    <br><br>
    <a href="/todolist/login/cadastro_usuario.php" class="link-branco">Não tem conta? Cadastre-se</a>
</form>
  

    <?php if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    login();
    }?>

    </div>
</body>
</html>

<?php
include_once RODAPE;
?>
