<?php
session_start();
require_once '../funcoes.php';


$eventos = listarEvento($conexao);
while ($l = $eventos->fetch_assoc()) {

    echo "<h3>" . htmlspecialchars($l['evento_nome']) . "</h3>";

    echo "<p>Data: " . htmlspecialchars($l['evento_data']) . "</p>";
    echo "<p>Local: " . htmlspecialchars($l['evento_local']) . "</p>";
    echo "<p>Modalidade: " . htmlspecialchars($l['evento_modalidade']) . "</p>";
    echo "<p>Inscritos: " . htmlspecialchars($l['evento_inscritos']) . "</p>";
    echo "<p>Valor: R$ " . htmlspecialchars($l['evento_valor']) . "</p>";
    echo "<p>Distância: " . htmlspecialchars($l['evento_distancia']) . "</p>";
    
    $imagem = basename($l['evento_imagem']);
    echo "<img src='uploads/" . htmlspecialchars($imagem) . "' 
               alt='uploads/" . htmlspecialchars($imagem) ."'
               width='300'>";

    echo "<hr>";
    
}

?>
