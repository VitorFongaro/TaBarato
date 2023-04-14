<?php
    include 'conexao.php';

    $id_mercado = $_POST['im'];
    $id_produto = $_POST['ip'];
    $quantidade = $_POST['quantidade'];
    $preco = $_POST['preco'];

    $query = "UPDATE produtos
              SET Quantidade = '$quantidade', Preco = '$preco'
              WHERE ID_Produto = '$id_produto'  AND ID_Mercado = '$id_mercado'";
    mysqli_query($conexao, $query);
    
    mysqli_close($conexao);
    
    header("location: ../admin_mercado/admin.php?id=" . $id_mercado);
?>