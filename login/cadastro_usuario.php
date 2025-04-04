<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once $_SERVER['DOCUMENT_ROOT']."/todolist/helpers/Config.php";
require_once $_SERVER['DOCUMENT_ROOT']."/todolist/models/Usuario.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    
    $nome  = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
    
    if (verificarEmailExistente($email)) {
        $_SESSION['mensagem_erro'] = "Este email já está cadastrado!";
        header("Location: cadastro_usuario.php");
        exit();
    }
    
    $resultado = inserirUsuario($nome, $email, $senha);

    

    if ($resultado) {
        $_SESSION['mensagem_sucesso'] = "Usuário cadastrado com sucesso!";
    } else {
        $_SESSION['mensagem_erro'] = "Erro ao cadastrar usuário!";
    }

    header("Location: cadastro_usuario.php");
    exit();
}

include_once CABECALHO;
?>

<main class="container">
    <div class="row">
        <div class="col-sm-9 mx-auto">
            <h3 class="text-center m-4">Cadastro de Usuário</h3>

            <form action="cadastro_usuario.php" method="post" class="row g-3">
                <div class="col-12">
                    <label class="form-label" for="nome">Nome</label>
                    <input type="text" name="nome" class="form-control" id="nome" required>
                </div>

                <div class="col-12">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" required>
                </div>

                <div class="col-12">
                    <label class="form-label" for="senha">Senha</label>
                    <input type="password" name="senha" class="form-control" id="senha" required>
                </div>                

                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Cadastre-se</button>                   
                </div>
            </form>

        </div>
    </div>
</main>

<?php
if (isset($_SESSION['mensagem_sucesso'])) {
    echo '<div class="modal fade show" id="sucessoModal" tabindex="-1" aria-labelledby="sucessoModalLabel" style="display:block;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">                        
                        <button type="button" class="btn-close" onclick="fecharModal()" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <i class="fas fa-check-circle" style="font-size: 50px; color: green;"></i><br><br>
                        ' . $_SESSION['mensagem_sucesso'] . '<br><br>
                        <!-- Botão de ir para a tela de login -->
                        <a href="login.php" class="btn btn-primary">Ir para Login</a>
                    </div>
                </div>
            </div>
          </div>';
    unset($_SESSION['mensagem_sucesso']);
}


if (isset($_SESSION['mensagem_erro'])) {
    echo '<div class="modal fade show" id="erroModal" tabindex="-1" aria-labelledby="erroModalLabel" style="display:block;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">                        
                        <button type="button" class="btn-close" onclick="fecharModal()" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <i class="fas fa-exclamation-circle" style="font-size: 50px; color: red;"></i><br><br>
                        ' . $_SESSION['mensagem_erro'] . '
                    </div>
                </div>
            </div>
          </div>';
    unset($_SESSION['mensagem_erro']);
}
?>


<script>
    function fecharModal() {
        var modalSucesso = document.getElementById('sucessoModal');
        var modalErro = document.getElementById('erroModal');
        
        if (modalSucesso && modalSucesso.style.display !== "none") {
            modalSucesso.style.display = "none";
        }
        
        if (modalErro && modalErro.style.display !== "none") {
            modalErro.style.display = "none";
        }
    }
</script>



<?php
include_once RODAPE;
?>