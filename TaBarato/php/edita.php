<?php
    include 'conexao.php';
    session_start(); 

    $id = $_POST['id'];
    $cnpj = $_POST['cnpj'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];

    function validaCNPJ($cnpj){
        $cnpj = preg_replace('/[^0-9]/', '', (string) $cnpj); // Formata para deixar apenas os números.
        if (strlen($cnpj) !== 14) {
            return false; // Retorna falso se o CNPJ não tiver os 14 dígitos.
        }
        $cnpj = preg_replace('/\D/', '', $cnpj);
        return preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/', '$1.$2.$3/$4-$5', $cnpj); // Formata o CNPJ com pontuação.
    }

    $cnpj_formatado = validaCNPJ($cnpj);

    if($cnpj_formatado){
        $query = "UPDATE mercados 
                  SET CNPJ = '$cnpj_formatado', Email = '$email', Endereco = '$endereco' 
                  WHERE ID_Mercado = '$id'";
        mysqli_query($conexao, $query);
        header("location: ../admin/admin.php");
    } 
    else{
        $_SESSION['erro'] = 'CNPJ inválido'; 
        header("location: ../edita/edita.php?id=" . $id);
    }

    mysqli_close($conexao);
?>