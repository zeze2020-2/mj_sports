<?php
require_once 'conexao.php';

function verificarLogin(){
    if (!isset($_SESSION['usuario'])) {
        header("Location: login.php");
    exit;
    }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERFIL</title>
</head>
<body>

    <?php require_once "funcoes.php"?>
    
<?php
function listarUsuario($conexao){
        return $conexao->query("SELECT * FROM usuario where ");
}

?>
<!--  ABRIR SESSAO E PUXAR AS INFORMACOES DO USUARIO LOGADO -->

CPF <?php$_SESSION['usuario_cpf']?>
NOME <?php$_SESSION['usuario_nome']?>
DATA DE NASCIMENTO <?php$_SESSION['usuario_nascimento']?>
EMAIL <?php$_SESSION['usuario_email']?>
SENHA <?php$_SESSION['usuario_senha']?>


Alterar avatar
puxar de alguma pagina se e atleta ou adm ver dps

<!--  LISTAR EVENTO CADASTRADOS -->




    
</body>
</html>