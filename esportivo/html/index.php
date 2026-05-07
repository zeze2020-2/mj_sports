<h1>Bem vindo ao MJ Sports!</h1>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="usuario/salvar_usuario.php" method="POST">
        Cpf: <br>
        <input type="text" name="cpf"  required > <br><br>

        Nome Completo: <br>
        <input type="text" name="nome"  required> <br><br>

        Data de nascimento: <br>
        <input type="date" name="nascimento"  required > <br><br>

        Sexo: <br>
        <input type="text" name="sexo"  required> <br><br>
              
        email: <br>
        <input type="text" name="email"  required> <br><br>

        Senha: <br>
        <input type="text" name="senha"  required> <br><br>

        <input type="submit" value="Salvar"> 


    </form>
</body>
</html>



