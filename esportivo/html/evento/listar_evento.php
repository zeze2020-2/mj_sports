<?php
session_start();
require_once '../funcoes.php';


$eventos = listarEvento($conexao);
while($l = $eventos->fetch_assoc()){
    if (!empty($l['foto'])) {
        echo "<img src='" . $l['foto'] . "' width='100' alt='Capa'><br>";
    } else {
        echo "<em>[Sem imagem]</em><br>";
    }

    print_r($l);
    echo "<hr>";
}

?>
