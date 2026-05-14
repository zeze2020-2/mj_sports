<?php 
    require_once 'conexao.php';

    function verificarLogin(){
        return isset($_SESSION['usuario']);
    }
    
    function verificarAdmin(){
        return (isset($_SESSION['tipo']) && $_SESSION['tipo'] == 'admin');
    }

    function logout(){
        session_destroy();
    }

    function login($conexao, $cpf, $senha){
        $sql = "SELECT * FROM leitores WHERE cpf=? AND senha =?";

        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ss", $cpf, $senha);
        $stmt->execute();

        $resultado = $stmt->get_result();

        if($resultado->num_rows > 0){
            $usuario = $resultado->fetch_assoc();
            $_SESSION['usuario'] = $usuario['nome'];
            $_SESSION['id'] = $usuario['id'];
            $_SESSION['tipo'] = $usuario['tipo'];

            return true;
        }

        return false;
    }
    //CRUD para leitores
    function inserirLeitor($conexao, $nome, $senha, $cpf, $telefone, $nascimento, $tipo){
        $sql = "INSERT INTO leitores (nome, senha, cpf, telefone, nascimento, tipo)
			values (?, ?, ?, ?, ?, ?)";
        
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ssssss", $nome, $senha, $cpf, $telefone, $nascimento, $tipo);
        return $stmt->execute();
    }
    function listarLeitores($conexao){
        return $conexao->query("SELECT * FROM leitores");
    }
    function buscarLeitor($conexao, $id){
        $sql = "SELECT * FROM leitores WHERE id=?";

        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->get_result();

    }
    function buscarLeitorPorNome($conexao, $nome){
        $sql = "SELECT * FROM leitores WHERE nome like ?";
        $stmt = $conexao->prepare($sql);

        $nomeBusca = "%".$nome."%";
        $stmt->bind_param("s", $nomeBusca);
        $stmt->execute();
        
        return $stmt->get_result();
    }
    function atualizarLeitor($conexao, $id, $nome, $senha, $cpf, $telefone, $nascimento, $tipo){
        $sql = "UPDATE leitores set nome = ?, senha = ?, cpf = ?, telefone = ?, nascimento = ?, tipo = ? WHERE id = ? ";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ssssssi", $nome, $senha, $telefone, $nascimento, $tipo, $id);
        return $stmt->execute();

    }
    function deletarLeitor($conexao, $id){
        $sql = "DELETE FROM leitores WHERE id=?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    /*mesma coisa pro resto*/ 

    function inserirUsuario($conexao, $cpf, $nome, $nascimento, $sexo, $email, $senha){
        $sql = "INSERT INTO usuario (nome, senha, cpf, telefone, nascimento, tipo)
			values (?, ?, ?, ?, ?, ?)";
        
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ssssss", $cpf, $nome, $nascimento, $sexo, $email, $senha);
        return $stmt->execute();
    }

    function verificarOrg(){
        return (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'org');
    }

meu pau é grande
?>