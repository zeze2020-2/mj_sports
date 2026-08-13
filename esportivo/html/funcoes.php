<?php

    //CRUD USUARIO




    function inserirUsuario($conexao, $cpf, $nome, $nascimento, $sexo, $email, $senha){
        $sql = "INSERT INTO usuario (usuario_cpf, usuario_nome, usuario_nascimento, usuario_sexo, usuario_email, usuario_senha)
			values (?, ?, ?, ?, ?, ?)";
        
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ssssss", $cpf, $nome, $nascimento, $sexo, $email, $senha);
        return $stmt->execute();
    }

    function verificarOrg(){
        return (isset($_SESSION['usuario_tipo']) && $_SESSION['usuario_tipo'] == 'org');
    }

    function verificarLogin(){
        return isset($_SESSION['usuario']);
    }

    function logout(){
        session_destroy();
    }
    
    function login($conexao, $cpf, $senha){
        $sql = "SELECT * FROM usuario WHERE usuario_cpf=? AND usuario_senha =?";

        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ss", $cpf, $senha);
        $stmt->execute();

        $resultado = $stmt->get_result();

        if($resultado->num_rows > 0){
            $usuario = $resultado->fetch_assoc();
            $_SESSION['usuario'] = $usuario['usuario_nome'];
            $_SESSION['id'] = $usuario['usuario_id'];
            $_SESSION['tipo'] = $usuario['usuario_tipo'];

            return true; 
        }

        return false;
    }

    function listarUsuario($conexao){
        return $conexao->query("SELECT * FROM usuario");
    }

      function buscarUsuario($conexao, $id){
        $sql = "SELECT * FROM usuario WHERE usuario_id=?";

        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->get_result();
      }
      function buscarUsuarioPorNome($conexao, $nome){
        $sql = "SELECT * FROM usuario WHERE usuario_nome like ?";
        $stmt = $conexao->prepare($sql);

        $nomeBusca = "%".$nome."%";
        $stmt->bind_param("s", $nomeBusca);
        $stmt->execute();
        
        return $stmt->get_result();
      }
      function atualizarUsuario($conexao, $id, $cpf, $nome, $nascimento, $sexo, $email, $senha){
        $sql = "UPDATE usuario set cpf = ?, nome = ?, nascimento = ?, sexo = ?, email = ?, senha = ? WHERE usuario_id = ? ";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("ssssssi", $cpf, $nome, $nascimento, $sexo, $email, $senha, $id);
        return $stmt->execute();

    }
    function deletarUsuario($conexao, $id){
        $sql = "DELETE FROM usuario WHERE usuario_id=?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
    


    //CRUD PAGAMENTO
    // chave estrageira se der erro perguntar
    function inserirPagamento($conexao, $forma, $data, $usuario){
        $sql = "INSERT INTO pagamento (pagamento_forma, pagamento_data, usuario_id)
			values (?, ?, ?)";
        
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("sii", $forma, $data, $usuario);
        return $stmt->execute();
    }
    function listarPagamento($conexao){
        return $conexao->query("SELECT * FROM pagamento");
    }
    function buscarPagamento($conexao, $id){
        $sql = "SELECT * FROM pagamento WHERE pagamento_id=?";

        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();



        return $stmt->get_result();
      }
      function atualizarPagamento($conexao, $id, $evento, $usuario, $forma, $data){
        $sql = "UPDATE pagamento set pagamento_id = ?, evento_id = ?, usuario_id = ?, pagamento_forma = ?, pagamento_data = ?, WHERE pagamento_id = ? ";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("iiiss", $evento, $usuario, $forma, $data, $id);
        return $stmt->execute();

    }
    function deletarPagamento($conexao, $id){
        $sql = "DELETE FROM pagamento WHERE pagamento_id=?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }



    //CRUD EVENTO



    function inserirEvento($conexao, $nome, $data, $local, $modalidade, $inscritos, $valor, $distancia, $categoria){
        $sql = "INSERT INTO usuario (evento_nome, evento_data, evento_local, evento_modalidade, evento_inscritos, evento_valor, evento_distancia, evento_categoria)
			values (?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("sisiiss", $conexao, $nome, $data, $local, $modalidade, $inscritos, $valor, $distancia, $categoria);
        return $stmt->execute();
    }

    function listarEvento($conexao){
        return $conexao->query("SELECT * FROM evento");
    }

      function buscarEvento($conexao, $id){
        $sql = "SELECT * FROM evento WHERE evento_id=?";

        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        return $stmt->get_result();
      }
      function buscarEventoPorNome($conexao, $nome){
        $sql = "SELECT * FROM evento WHERE evento_nome like ?";
        $stmt = $conexao->prepare($sql);

        $nomeBusca = "%".$nome."%";
        $stmt->bind_param("s", $nomeBusca);
        $stmt->execute();
        
        return $stmt->get_result();
      }
      function atualizarEvento($conexao, $id, $nome, $data, $local, $modalidade, $inscritos, $valor, $distancia, $categoria){
        $sql = "UPDATE evento set evento_nome = ?, evento_data = ?, evento_local = ?, evento_modalidade = ?, evento_inscritos = ?, evento_valor = ?, evento_distancia, event_categoria = ? = ? WHERE evento_id = ? ";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("sisiiss", $conexao, $nome, $data, $local, $modalidade, $inscritos, $valor, $distancia, $categoria, $id);
        return $stmt->execute();

    }
    function deletarEvento($conexao, $id){
        $sql = "DELETE FROM evento WHERE evento_id=?";
        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    ?>
   