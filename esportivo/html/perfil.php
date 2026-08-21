<?php 
require_once 'conexao.php';
session_start();
require_once "funcoes.php";

verificarLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERFIL</title>
</head>
<body>
    <?php

    $cpf = $_SESSION['usuario_cpf'] ?? '';
    $senha = $_SESSION['usuario_senha'] ?? '';
    $nome = $_SESSION['usuario_nome'] ?? '';
    $nascimento = $_SESSION['usuario_nascimento'] ?? '';
    $email = $_SESSION['usuario_email'] ?? '';

    echo "CPF: " . $cpf;
    echo "<br>";

    echo "Senha: " . $senha;
    echo "<br>";

    echo "Nome: " . $nome;
    echo "<br>";

    echo "Nascimento: " . $nascimento;
    echo "<br>";

    echo "E-mail: " . $email;
    echo "<br>";


    echo "<pre>";
print_r($_SESSION);
echo "</pre>";
    ?>

</body>
</html>
