<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
       /* estabelece a ligação à base de dados */
$ligacao = new mysqli("localhost", "root", "", "cadastro");

/* verifica se ocorreu algum erro na ligação */
if ($ligacao->connect_errno) {
    echo "Falha na ligação: " . $ligacao->connect_error; 
    exit();
}


/* Verificar se o formulário foi submetido */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = filter_input(INPUT_POST, 'nome');
    $email = filter_input(INPUT_POST, 'email');
    $telemovel = filter_input(INPUT_POST, 'telemovel');

    /* validar os dados recebidos do formulario */
    if (empty($nome) || empty($telemovel) || empty($telemovel)){
        echo "Todos os campos do formulário devem conter valores ";
        exit();
    }    
}
else{
   echo " Erro, formulário não submetido ";
   exit();
}


/* texto sql da consulta*/
//$consulta = "INSERT INTO users (nome,email,telemovel) VALUES ('$nome', '$email','$telemovel' )";
$consulta = "INSERT INTO users ( `nome` , `email` ,`telemovel`) VALUES ('$nome', '$email','$telemovel');";

/* executar a consulta e testar se ocorreu erro */
if (!$ligacao->query($consulta)) {
    echo " Falha ao executar a consulta: \"$consulta\" <br>" . $ligacao->error;
    $ligacao->close();  /* fechar a ligação */
}
else{
    /* percorrer os registos (linhas) da tabela e mostrar na página */
    echo $nome . " Estás registado/a quando tivermos novidades enviaremos sempre o email" ;
    }


  /*Para não permitir dados repetidos */  




    header('location:cursos.html');
    //$ligacao->close();       /* fechar a ligação */




    ?>
</body>
</html>