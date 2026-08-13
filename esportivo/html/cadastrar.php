<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
</head>
<body>
Cadastro <br><br>
<form method="post">
    <input type="text" name="nome" placeholder="Digite seu nome:" required><br><br>

    <input type="email" name="email" placeholder="Digite seu e-mail:" required><br><br>

    <input type="text" name="cpf" placeholder="Digite seu cpf:" required><br><br>
    
    <input type="text" name="sexo" placeholder="Digite seu sexo:" required><br><br>

    <input type="date" name="data" placeholder="Informe sua data de nascimento:" required><br><br>

    <p>Escolha seu tipo:</p>

<label>
  <input type="checkbox" name="tipo" value="organizador"> organizador
</label>

<label>
  <input type="checkbox" name="tipo" value="usuario"> usuario
</label> <br><br>


    <input type="text" name="senha" placeholder="Digite sua senha:" required><br><br>
    
    <input type="submit" value="Enviar">

</form>

<a href="index.php">Retornar ao login</a>

<?php
