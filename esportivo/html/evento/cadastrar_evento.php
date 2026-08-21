<?php
require_once("../conexao.php");
require_once("../funcoes.php");

$nome = $_POST['evento_nome'];
$data = $_POST['evento_data'];
$local = $_POST['evento_local'];
$modalidade = $_POST['evento_modalidade'];
$inscritos = $_POST['evento_inscritos'];
$valor = $_POST['evento_valor'];
$distancia = $_POST['evento_distancia'];
$imagem = $_POST['evento_imagem'];

$resultado = inserirEvento($conexao, $nome, $data, $local, $modalidade, $inscritos, $valor, $distancia, $imagem);

if($resultado){
    echo "Evento cadastrado!";
} else {
    echo "Erro no cadastro";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>MJ Sports</h1>
    
</body>
</html>