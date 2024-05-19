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
       $ligacao = new mysqli("localhost", "root", "", "cadastro");
       if ($ligacao->connect_errno) {
        echo "Falha na ligação: " . $ligacao->connect_error; 
        exit();
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = filter_input(INPUT_POST, 'nome');
        $email = filter_input(INPUT_POST, 'email');
        $telemovel = filter_input(INPUT_POST, 'telemovel');
        $mensagem = filter_input(INPUT_POST, 'mensagem');
    
        if (empty($nome) || empty($telemovel) || empty($telemovel) || empty($mensagem)){
            echo "Todos os campos do formulário devem conter valores ";
            exit();
        }    
    }
    else{
       echo " Erro, formulário não submetido ";
       exit();
    }
    
    
    $consulta = "INSERT INTO interessados ( `nome` , `email` ,`telemovel`,`mensagem`) VALUES ('$nome', '$email','$telemovel','$mensagem');";
    
    
    if (!$ligacao->query($consulta)) {
        echo " Falha ao executar a consulta: \"$consulta\" <br>" . $ligacao->error;
        $ligacao->close();  /* fechar a ligação */
    }
    else{
       
        echo $nome . " Estás registado/a quando tivermos novidades enviaremos sempre o email" ;
        }
    
    
        
        header('location:cursos.html');

        
    ?>
</body>
</html>