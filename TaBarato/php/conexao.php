<?php 
    $servidor = "localhost";
    $usuario = "root";
    $senha = "";
    $banco = "ta_barato"; // Mudar para o nome do banco de dados.

    try{
        $conexao = mysqli_connect($servidor, $usuario, $senha, $banco); 
        if (!$conexao){
            die("Conexão falhou: " . mysqli_connect_error());
        }
    } 
    catch(mysqli_sql_exception $e){
        echo "Ocorreu um erro na conexão com o banco de dados: " . $e->getMessage();
    }
?>