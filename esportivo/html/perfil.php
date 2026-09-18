<?php
session_start();
require_once "conexao.php";
require_once "funcoes.php";

verificarLogin();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
</head>
<body>
    


    <?php
     
    $cpf = $_SESSION['usuario_cpf'] ?? '';
    $sql = "SELECT usuario_nascimento, usuario_nome, usuario_email, usuario_cpf, usuario_senha, usuario_sexo, usuario_tipo from banco.usuario WHERE usuario_cpf = '$cpf'";

     $resultado = $conexao->query($sql);
     while ($usuario = $resultado->fetch_assoc()) {
    echo "Nome: " . $usuario['usuario_nome'] . "<br>";
    echo "Nascimento: " . $usuario['usuario_nascimento'] . "<br>";
    echo "cpf: " . $usuario['usuario_cpf'] . "<br>";
    echo "senha: " . $usuario['usuario_senha'] . "<br>";
    echo "Email: " . $usuario['usuario_email'] . "<br>";
    echo "Sexo: " . $usuario['usuario_sexo'] . "<br>";
    echo "<hr>";
}

    ?>

</body>
</html>
