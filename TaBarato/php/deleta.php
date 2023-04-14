<?php
    include 'conexao.php';

    $id = $_GET['id'];

    $query = "DELETE FROM mercados 
              WHERE ID_Mercado = '$id'";
    mysqli_query($conexao, $query);
    
    mysqli_close($conexao);
    
    header("location: ../admin/admin.php");
?>