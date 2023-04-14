<?php 
    session_start(); 
    include 'conexao.php';
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $query = "SELECT ID_Mercado, Email, Senha 
              FROM mercados 
              WHERE Email = '$email'"; 
    $resultado = mysqli_query($conexao, $query); 

    if($email == "admin@admin" and $senha == "admin"){
      header("location: ../admin/admin.php");
    }
    else{
      if(mysqli_num_rows($resultado) == 1){
        $usuario = mysqli_fetch_assoc($resultado);
        if($senha == $usuario['Senha']){
            header("location: ../admin_mercado/admin.php?id=" . $usuario['ID_Mercado']);
        }
        else{
            $_SESSION['erro'] = "Senha incorreta.";
            header("location: ../login/login.php");
        }
      }
      else{
        $_SESSION['erro'] = "Email não encontrado."; 
        header("location: ../login/login.php"); 
      }
    }
    
    mysqli_close($conexao);
?>
