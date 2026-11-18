<?php

ob_start();

require_once "funcoes.php";

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['cpf'])) {

    $cpf = $_POST['cpf'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $sucesso = login($conexao, $cpf, $senha);

    // if ($sucesso) {
    // echo "Login OK"; var_dump($_SESSION); 
    // exit;

    // } else {
    //         echo "Login falhou"; exit;
    // }
    if ($sucesso) {

        header("Location: home.php");
        exit;

    } else {
        $erro = true;
    }
}
?>



<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login | MJ Sports</title>

    <link rel="stylesheet" href="login.css">
</head>

<body>

    <header>
        <div class="logo">
            MJ<span>SPORTS</span>
        </div>
    </header>

    <main>

        <div class="login-container">

            <div class="login-titulo">

                <span class="subtitulo">
                    BEM-VINDO DE VOLTA
                </span>

                <h1>
                    FAÇA SEU <span>LOGIN</span>
                </h1>

                <p>
                    Acesse sua conta e continue sua jornada
                    de conquistas com a MJ Sports.
                </p>

            </div>

            <form action= "" method="POST">

                <div class="campo">

                    <label for="cpf">CPF</label>

                    <input
                        type="text"
                        id="cpf"
                        name="cpf"
                        placeholder="Digite seu CPF"
                        maxlength="14"
                        required
                    
                    >
                    <script>
  document.getElementById('cpf').addEventListener('input', function() {
    this.value = this.value
      .replace(/\D/g, '')
      .replace(/(\d{3})(\d)/, '$1.$2')
      .replace(/(\d{3})(\d)/, '$1.$2')
      .replace(/(\d{3})(\d{1,2})$/, '$1-$2');
  });
</script>

                </div>

                <div class="campo">

                    <label for="senha">SENHA</label>

                    <input
                        type="password"
                        id="senha"
                        name="senha"
                        placeholder="Digite sua senha"
                        required
                    >

                </div>

                <button type="submit" class="botao">
                    ENTRAR NA CONTA <span>➜</span>
                </button>

            </form>

            <a href="index.php" class="voltar">
                ← Voltar para página inicial
            </a>

        </div>

        <div class="destaque">

            <h2>FOCO.</h2>
            <h2>FORÇA.</h2>
            <h2 class="laranja">SUPERAÇÃO.</h2>

        </div>

    </main>

    <footer>
        © 2026 MJ SPORTS | TODOS OS DIREITOS RESERVADOS
    </footer>

</body>
</html>
