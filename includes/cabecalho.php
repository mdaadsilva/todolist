<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sistema de Gerenciamento de Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="/todolist/assets/css/style.css">
    <!-- SweetAlert2 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Adicionar Icone no Navegador -->
    <link rel="icon" type="image/png" href="/todolist/assets/img/logo-icon.png" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />


</head>

<body>
        <!-- Conteúdo --><!-- Cabeçalho -->
<header class="">

<nav class="navbar navbar-expand-lg bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="/todolist/index.php"> 
          <img src="/todolist/assets/img/unnamed.png" width="30" height="30" class="d-inline-block align-top" alt="">
        <strong class="nometodolist">TodoList</strong>
      </a>

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarText">

        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            
        </ul>

        <span class="sessao-usuario">
          <?php if (!isset($_SESSION['usuario_id'])): ?>
              <!-- <a class="btn btn-primary" href="/todolist/login/login.php">Entrar</a> -->
          <?php else: ?>
              <a class="btn btn-danger" href="/todolist/login/logout.php">Sair</a>
          <?php endif; ?>
      </span>
    </div>
    </div>
  </nav>


</header>
<!-- Fim Cabeçalho -->
