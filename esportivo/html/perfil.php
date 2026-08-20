<?php require_once 'conexao.php';
session_start();
require_once "funcoes.php";

verificarLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    require_once "funcoes.php";

    $CPF = $_SESSION['usuario_cpf'];
    $NOME = $_SESSION['usuario_nome'];
    $DATA_DE_NASCIMENTO= $_SESSION['usuario_nascimento'];
    $EMAIL = $_SESSION['usuario_email'];
    $SENHA = $_SESSION['usuario_senha'];

    echo $CPF;
    echo $NOME;
    echo $DATA_DE_NASCIMENTO;
    echo $EMAIL;
    echo $SENHA;

    ?>
</body>
</html>
