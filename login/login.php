<?php
require_once "../helpers/Config.php";
include_once CABECALHO;
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Tela de login</title>
</head>
<body class="body">
    <div class="div">
        <h1>Login</h1>
        <input type="text" placeholder="E-mail" class="input">
        <br><br>
        <input type="password" placeholder="Senha" class="input">
        <br><br>
        <button class= "button">Entrar</button>
    </div>
</body>
</html>

<?php
include_once RODAPE;

?>