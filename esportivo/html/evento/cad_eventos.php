<?php
session_start();
require_once '../funcoes.php';
verificarLogin();

if (isset($_POST['enviar'])) {
    // Obter e remover espaços em branco das extremidades
    $nome = $_POST['evento_nome'] ?? '';
    $data = $_POST['evento_data'] ?? '';
    $local = $_POST['evento_local'] ?? '';
    $modalidade = $_POST['evento_modalidade'] ?? '';
    $inscritos = $_POST['evento_inscritos'] ?? '';
    $valor = $_POST['evento_valor'] ?? '';
    $distancia = $_POST['evento_distancia'] ?? '';
    $arquivoImagem = $_FILES['capa'] ?? null;


if ($arquivoImagem) {
    $arquivoImagem = uploadFoto($arquivoImagem);

    if ($arquivoImagem === false) {
        echo $arquivoImagem;
        die("Erro ao fazer upload da imagem.");
    }
}

    $sucesso = inserirEvento($conexao, $nome, $data, $local, $modalidade, $inscritos, $valor, $distancia, $arquivoImagem);

    if ($sucesso) {
        echo "evento cadastrado com sucesso!";
    } else {
        echo "Erro no cadastro do evento. Verifique a imagem ou a conexão.";
    }
    
}
?>

<form method="POST" enctype="multipart/form-data">
    <p>
        <label> Nome do evento: </label><br>
        <input type="text" name="evento_nome" required>
    </p>
    <p>
        <label>Data: </label><br>
        <input type="date" name="evento_data" required> 
    </p>
    <p>
        <label>Local: </label><br>
        <input type="text" name="evento_local" required>
    </p>
    <p>
        <label>Modalidade: </label><br>
        <input type="text" name="evento_modalidade" required>
    </p>
        <p>
        <label>Número de inscritos: </label><br>
        <input type="text" name="evento_inscritos" required>
    </p>
    <p>
        <label> Valor da incrição: </label><br>
        <input type="text" name="evento_valor" required>
    </p>
        <p>
        <label> Distancia da prova: </label><br>
        <input type="text" name="evento_distancia" required>
            <p>
        <label> Poster: </label><br>
        <input type="file" name="capa">
    </p>
    </p>
    <button type= "submit" name="enviar">Enviar o poster do evento</button>
</form>
