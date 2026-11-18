<?php
require_once '../funcoes.php';

if (isset($_POST['enviar'])) {
    // Obter e remover espaços em branco das extremidades
    $cpf = $_POST['usuario_cpf'] ?? '';
    $nome = $_POST['usuario_nome'] ?? '';
    $nascimento = $_POST['usuario_nascimento'] ?? '';
    $sexo = $_POST['usuario_sexo'] ?? '';
    $email = $_POST['usuario_email'] ?? '';
    $senha = $_POST['usuario_senha'] ?? '';
    $tipo = $_POST['usuario_tipo'] ?? '';


    $sucesso = inserirUsuario($conexao, $cpf, $nome, $nascimento, $sexo, $email, $senha, $tipo);

    if ($sucesso) {
        echo "Cadastrado com sucesso!";
    } else {
        echo "Erro no cadastro.";
    }
    
}
?>

<form method="POST" enctype="multipart/form-data">
    <p>
        <label>CPF: </label><br>
        <input type="text" name="usuario_cpf" id="cpf" maxlength="14"required>

        <script>
            document.getElementById('cpf').addEventListener('input', function() {
            this.value = this.value
                .replace(/\D/g, '')
                .replace(/(\d{3})(\d)/, '$1.$2')
                .replace(/(\d{3})(\d)/, '$1.$2')
                .replace(/(\d{3})(\d{1,2})$/, '$1-$2');
            });
        </script>
    </p>

    <p>
        <label>Nome: </label><br>
        <input type="text" name="usuario_nome" required> 
    </p>
    <p>
        <label>Data de nascimento: </label><br>
        <input type="date" name="usuario_nascimento" required>
    </p>
    <p>
        <label>Gênero: </label><br>
        <select>
        <option>Prefiro não dizer</option>
        <option> Homem</option>
        <option> Mulher</option>
</select>

    </p>
        <p>
        <label> Email: </label><br>
        <input type="text" name="usuario_email" required>
    </p>
    <p>
        <label> Senha: </label><br>
        <input type="text" name="usuario_senha" required>
    </p>
        <p>
        <label>usuário <input type="radio" name="usuario_tipo" required> </label><br>
        <label> organizador<input type="radio" name="usuario_tipo" required></label><br>
    </p>
  
    <button type="submit" name="enviar">Cadastrar</button>
</form>
