<?php
session_start();
require_once "conexao.php";
require_once "funcoes.php";

verificarLogin();
$id = $_SESSION['id'];
$eventos = eventosUsuario($conexao, $id);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
        <link rel="stylesheet" href="perfil.css">

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
    echo "<hr>" ;
}

    // echo "<h1> Suas Inscrições </h1>";

    // $idu = $_SESSION['id'] ?? '';

    // $sqle = "SELECT evento_id, usuario_id from banco.inscricoes WHERE usuario_id = '$idu'";

    // $resultadoe = $conexao->query($sqle);

    // while ($inscricao = $resultadoe->fetch_assoc()) {
    // echo "Evento: " . $inscricao['evento_id'] . "<br>";
    // echo "Seu nome: " . $inscricao['usuario_id'] . "<br> <br> <br>";

    //  }

    echo "<h2>Minhas Inscrições</h2>";

    if (count($eventos) > 0) {

        foreach ($eventos as $evento) {

            echo "<h3>" . htmlspecialchars($evento['evento_nome']) . "</h3>";

            echo "<p><strong>Data:</strong> " .
            date('d/m/Y H:i', strtotime($evento['evento_data'])) .
            "</p>";

            echo "<p><strong>Local:</strong> " .
            htmlspecialchars($evento['evento_local']) .
            "</p>";

            echo "<hr>";

        }

    } else {

        echo "<p>Você ainda não está inscrito em nenhum evento.</p>";

    }

    ?>

</body>
</html>
