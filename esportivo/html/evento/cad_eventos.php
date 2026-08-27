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
    $valor = $_POST['evento_valor'] ?? '';
    $distancia = $_POST['evento_distancia'] ?? '';
    $arquivoImagem = $_FILES['capa'] ?? null;


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
        <label>nome: </label><br>
        <input type="text" name="evento_nome" required>
    </p>
    <p>
        <label>Data: </label><br>
        <input type="date" name="evento_data" required> 
    </p>
    <p>
        <label>local: </label><br>
        <input type="text" name="evento_local" required>
    </p>
    <p>
        <label>modalidade: </label><br>
        <input type="number" name="evento_modalidade" required>
    </p>
    <p>
        <label>valor: </label><br>
        <input type="text" name="evento_valor" required>
    </p>
        <p>
        <label>distancia: </label><br>
        <input type="text" name="evento_distancia" required>
            <p>
        <label>poster: </label><br>
        <input type="file" name="evento_imagem" required>
    </p>
    </p>
    <button type="submit" name="enviar">Enviar Imagem</button>
</form>
