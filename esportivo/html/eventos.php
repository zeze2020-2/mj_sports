





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php 
   require_once "funcoes.php";
    
   $eventos = listarEvento($conexao);

while ($evento = $eventos->fetch_assoc()) {
    echo $evento['evento_nome'];
    echo "/  ";
    echo $evento['evento_data'];
    echo "/  ";
    echo $evento['evento_local'];
    echo "/  ";
    echo $evento['evento_modalidade'];
    echo "/  ";
    echo $evento['evento_valor'];

    echo "<br><br>";
}

   

   ?>

   
</body>
</html>
   