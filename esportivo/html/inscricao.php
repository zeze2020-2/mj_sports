<?php 
require_once 'conexao.php';
session_start();
require_once "funcoes.php";
verificarLogin();
?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="inscricao.css">

    <title>Inscrição - Corrida</title>
</head>

<?php
$cpf = $_SESSION['usuario_cpf'] ?? '';

$sql = "SELECT usuario_nascimento, usuario_nome, usuario_email, usuario_cpf, usuario_sexo, usuario_tipo 
        FROM banco.usuario 
        WHERE usuario_cpf = '$cpf'";

$resultado = $conexao->query($sql);

$usuario = $resultado->fetch_assoc();
?>


<!-- pegar do perfil o metodo de puxar informaçoes para ja clicar na pagina de incriçoes e ja vir preenchido o formulario fazer o msm metodo -->
    <form method="POST" action="">

    <label for="nome">Nome completo</label>
    <input 
        type="text" 
        id="nome" 
        name="nome"
        placeholder="Digite seu nome"
        value="<?= htmlspecialchars($usuario['usuario_nome'] ?? '') ?>"
        required
    >

    <label for="cpf">CPF</label>
    <input 
        type="text" 
        id="cpf" 
        name="cpf"
        placeholder="Digite seu CPF"
        value="<?= htmlspecialchars($usuario['usuario_cpf'] ?? '') ?>"
        required
    >

    <label for="email">E-mail</label>
    <input 
        type="email" 
        id="email" 
        name="email"
        placeholder="Digite seu e-mail"
        value="<?= htmlspecialchars($usuario['usuario_email'] ?? '') ?>"
        required
    >

    <label for="categoria">Categoria</label>
    <select id="categoria" name="categoria" required>
        <option value="">Selecione uma categoria</option>
        <option value="42km">42 km</option>
        <option value="21km">21 km</option>
        <option value="10km">10 km</option>
        <option value="5km">5 km</option>
    </select>

    <button type="submit">Confirmar inscrição</button>

</form>
