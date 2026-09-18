<?php
session_start();
require_once "conexao.php";
require_once "funcoes.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Início</title>
   </head>
    <link rel="stylesheet" href="home.css">



</head>


    <h1>Bem-vindo ao MJ Sports!</h1>

    <nav>
        <ul>
            <li><a href="evento/cad_eventos.php">Criar Evento</a></li>
            <li><a href="evento/listar_evento.php">ver eventos</a></li>
            <li><a href="/perfil.php">ver perfil</a></li>
        </ul>
    </nav>


    <div class="cards">

    
    <?php
    $sql = "SELECT * FROM evento ORDER BY evento_data ASC";
    $resultado = $conexao->query($sql);
    ?>

    <?php while ($evento = $resultado->fetch_assoc()): ?>

        <div class="card">

            <span class="tipo">
                <?= htmlspecialchars($evento['evento_modalidade']) ?>
            </span>

            <?php if (!empty($evento['evento_imagem'])): ?>
                <img 
                    src="evento/uploads/ <?= htmlspecialchars($evento['evento_imagem']) ?>" 
                    alt="<?= htmlspecialchars($evento['evento_nome']) ?>"
                >
            <?php endif; ?>

            <h2>
                <?= htmlspecialchars($evento['evento_nome']) ?>
            </h2>

            <p>
                <?= date('d/m/Y H:i', strtotime($evento['evento_data'])) ?>
            </p>

            <p>
                <?= htmlspecialchars($evento['evento_local']) ?>
            </p>

            <p>
                <?= htmlspecialchars($evento['evento_distancia']) ?>
            </p>

            <p>
                <?= htmlspecialchars($evento['evento_inscritos'] ?? 0) ?> inscritos
            </p>

            <p>
                R$ <?= number_format($evento['evento_valor'], 2, ',', '.') ?>
            </p>

            <a 
                href="inscricao.php?id=<?= $evento['evento_id'] ?>" 
                class="btn-inscrever"
            >
                Inscrever
            </a>

        </div>

    <?php endwhile; ?>


    

  
</div>
