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
        $ligacao = new mysqli("192.168.0.102","root", "", "appMobile");

        /* verifica se ocorreu algum erro na ligação */
        if ($ligacao->connect_errno)
        {
            echo "Falha na ligação: " . $ligacao->connect_error; 
            exit();
        }


        /* Verificar se o formulário foi submetido */
        if ($_SERVER["REQUEST_METHOD"] == "POST") 
        {
            $nome = filter_input(INPUT_POST, 'nomeSite');
            $email = filter_input(INPUT_POST, 'Email');
            $mensagem = filter_input(INPUT_POST, 'Mensagem');

            /* validar os dados recebidos do formulario */
            if (empty($nome) || empty($email) || empty($mensagem))
            {
                echo "Todos os campos do formulário devem conter valores ";
                exit();
            }    
        }
        else
        {
        echo " Erro, formulário não submetido ";
        exit();
        }


        /* texto sql da consulta*/
        //$consulta = "INSERT INTO siteForm (NomeSite,Email,Mensagem) VALUES ('$nome', '$email','$mensagem' )";
            echo"erro";
        $consulta = "INSERT INTO siteForm 'nomeSite' , 'Email' ,'Mensagem' VALUES ('$nome', '$email','$mensagem');";
        $resultado = mysql_query($consulta,$ligacao);
        /* executar a consulta e testar se ocorreu erro */
        if ($resultado) 
        {
            echo " Falha ao executar a consulta: \"$consulta\" <br>" . $ligacao->error;
            $ligacao->close();  /* fechar a ligação */
        }
        else
        {
            /* percorrer os registos (linhas) da tabela e mostrar na página */
            echo $nome . " Estás registado/a quando tiveremos novidades enviaremos sempre o email" ;
        }

            mysqli_close($ligacao);

           //header('location:index.html');
            //$ligacao->close();       /* fechar a ligação */
    ?>
</body>
</html>


