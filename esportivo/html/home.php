
<?php
//session_start();
require_once "conexao.php";
require_once "funcoes.php";
verificarLogin();

// Captura a categoria selecionada
$selecionada = trim($_GET['categoria'] ?? '');

// Busca todas as categorias cadastradas
$sql= "SELECT DISTINCT evento_modalidade FROM evento WHERE evento_modalidade IS NOT NULL
       AND evento_modalidade != '' ORDER BY evento_modalidade ASC";

$resultadoCategoria = $conexao->query($sql);

// Busca os eventos
if ($selecionada !== '') {

    $sql = "SELECT * FROM evento WHERE evento_modalidade = ? ORDER BY evento_data ASC";

    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("s", $selecionada);
    $stmt->execute();

    $resultadoEvento = $stmt->get_result();

} else {

    $sql = "SELECT * FROM evento ORDER BY evento_data ASC";
    $resultadoEvento = $conexao->query($sql);
}


?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Início</title>

    <link rel="stylesheet" href="home.css">
</head>

<body>

    <nav>
        <ul>
            <li><a href="evento/cad_eventos.php">Criar Evento</a></li>
            <li><a href="evento/listar_evento.php">Ver eventos</a></li>
            <li><a href="perfil.php">Ver perfil</a></li>
        </ul>
    </nav>

    <h1>Competições disponíveis</h1>

    <!-- BOTÕES DE CLASSIFICAÇÃO -->
    <div class="filtros">

        <a href="home.php"
           class="btn-filtro <?= $selecionada === '' ? 'ativo' : '' ?>">
            Todas
        </a>

        
<?php


//echo '<a href="home.php" class="btn-filtro">Todas</a>';

// BOTÕES DE CLASSIFICAÇÃO
while ($categoria = $resultadoCategoria->fetch_assoc()) {

    $nomeCategoria = $categoria['evento_modalidade'];

?>

    <a href="home.php?categoria=<?= urlencode($nomeCategoria) ?>"
       class="btn-filtro">

        <?= htmlspecialchars($nomeCategoria) ?>

    </a>

<?php
}
?>

</div>

<!-- LISTAGEM DOS EVENTOS -->
<div class="cards">


<?php

// BOTÕES DE CLASSIFICAÇÃO
while ($categoria = $resultadoCategoria->fetch_assoc()) {
    $nomeCategoria = $categoria['evento_modalidade'];

    echo '<a href="home.php?categoria=' . urlencode($nomeCategoria) . '" class="btn-filtro">';
    echo htmlspecialchars($nomeCategoria);
    echo '</a>';
}
    
echo '</div>';

// LISTAGEM DOS EVENTOS
echo '<div class="cards">';

if ($resultadoEvento && $resultadoEvento->num_rows > 0) {
    
    while ($evento = $resultadoEvento->fetch_assoc()) {
        echo '<div class="card">';
        echo '<span class="tipo">' . htmlspecialchars($evento['evento_modalidade']) . '</span>';
        echo '<h3>' . htmlspecialchars($evento['evento_modalidade']) . '</h3>';
        
        
        if (!empty($evento['evento_imagem'])) {
            echo '<img src="evento/uploads/' . htmlspecialchars($evento['evento_imagem']) . '" 
            alt="' . htmlspecialchars($evento['evento_nome']) . '">';
        }
        
        echo '<h2>' . htmlspecialchars($evento['evento_nome']) . '</h2>';
        echo '<p>' . date('d/m/Y H:i', strtotime($evento['evento_data'])) . '</p>';
        echo '<p>' . htmlspecialchars($evento['evento_local']) . '</p>';
        echo '<p>' . htmlspecialchars($evento['evento_distancia']) . '</p>';
        echo '<p>' . htmlspecialchars($evento['evento_inscritos'] ?? 0) . ' inscritos</p>';
        echo '<p>R$ ' . number_format($evento['evento_valor'], 2, ',', '.') . '</p>';
        echo '<a href="inscricao.php?id=' . $evento['evento_id'] . '" class="btn-inscrever">Inscrever</a>';
        echo '</div>';
    }
        
} else {
    
    echo '<p>Nenhuma competição encontrada nesta categoria.</p>';
}
        
echo '</div>';

?>
</div>
</body>
</html>





















