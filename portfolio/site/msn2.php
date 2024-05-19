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

        # Substitua abaixo os dados, de acordo com o banco criado
        $user = "192.168.0.102"; 
        $password = ""; 
        $database = "appMobile"; 

        # O hostname deve ser sempre localhost 
        $hostname = "root"; 

        # Conecta com o servidor de banco de dados 
        mysql_connect( $hostname, $user, $password ) or die( ' Erro na conexão ' ); 

        # Seleciona o banco de dados 
        mysql_select_db( $database ) or die( 'Erro na seleção do banco' );

        # Executa a query desejada 
        $query = "SELECT NomeSite,Email,Mensagem	 FROM siteForm"; 
        $result_query = mysql_query( $query ) or die(' Erro na query:' . $query . ' ' . mysql_error() ); 

        # Exibe os registros na tela 
        while ($row = mysql_fetch_array( $result_query )) 
        { 
            print $row[NomeSite] . "nome" . $row[Email] . "telefone" . $row[Mensagem]."email";
        }



    ?>

</body>
</html>