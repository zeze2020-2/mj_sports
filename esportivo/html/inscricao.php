<?php 
require_once 'conexao.php';
session_start();
require_once "funcoes.php";
verificarLogin();
?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="inscricao.css">

    <title>Inscrição - Corrida</title>
</head>

<body>
    
<?php
 $cpf = $_SESSION['usuario_cpf'] ?? '';
    $sql = "SELECT usuario_nascimento, usuario_nome, usuario_email, usuario_cpf, usuario_senha, usuario_sexo, usuario_tipo from banco.usuario WHERE usuario_cpf = '$cpf'";

    $resultado = $conexao->query($sql);
    while ($usuario = $resultado->fetch_assoc()) {
   

}
?>
<!-- pegar do perfil o metodo de puxar informaçoes para ja clicar na pagina de incriçoes e ja vir preenchido o formulario fazer o msm metodo -->
    <div class="formulario">

        <h1>Inscrição na corrida</h1>

        <p class="corrida">Maratona de São Paulo</p>

        <form>

            <label for="nome">Nome completo</label>
            <input type="text" id="nome" placeholder="Digite seu nome" required>
    

            <label for="cpf">CPF</label>
            <input type="text" id="cpf" placeholder="Digite seu CPF" required>

            <label for="email">E-mail</label>
            <input type="email" id="email" placeholder="Digite seu e-mail" required>

            <label for="telefone">Telefone</label>
            <input type="tel" id="telefone" placeholder="Digite seu telefone" required>

            <label for="categoria">Categoria</label>
            <select id="categoria" required>
                <option value="">Selecione uma categoria</option>
                <option value="42km">42 km</option>
                <option value="21km">21 km</option>
                <option value="10km">10 km</option>
                <option value="5km">5 km</option>
            </select>

            <button type="submit">Confirmar inscrição</button>

        </form>

        <a href="home.php" class="voltar">← Voltar</a>

    </div>

</body>

</html>
