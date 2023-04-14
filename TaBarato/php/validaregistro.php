<?php
    include 'conexao.php';
    session_start();

    $nome = $_POST['empresa'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email'];
    $cnpj = $_POST['cnpj'];
    $senha = $_POST['senha'];
    
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
        $query = "SELECT * 
                  FROM mercados 
                  WHERE Email = '$email'";
        $resultado = mysqli_query($conexao, $query);
        if(mysqli_num_rows($resultado) == 0){ 
            $query = "SELECT * 
                      FROM mercados 
                      WHERE CNPJ = '$cnpj_formatado'";
            $resultado = mysqli_query($conexao, $query);
            if(mysqli_num_rows($resultado) == 0){ 
                $query = "INSERT INTO mercados(Nome, Endereco, CNPJ, Email, Senha)
                          VALUES('$nome', '$endereco', '$cnpj_formatado', '$email', '$senha')";
                $resultado = mysqli_query($conexao, $query);
                if($resultado){
                    $_SESSION['erro'] = 'Registrado com sucesso.';
                    header("location: ../criar_conta/cadastro.php"); 
                }
                else{
                    $_SESSION['erro'] = 'Erro ao registrar.' . mysqli_error($conexao);
                    header("location: ../criar_conta/cadastro.php");
                }
            }
            else{
                $_SESSION['erro'] = 'CNPJ já cadastrado.';
            header("location: ../criar_conta/cadastro.php");
            }
        }
        else{
            $_SESSION['erro'] = 'Email já cadastrado.';
            header("location: ../criar_conta/cadastro.php");    
        }
    } 
    else{ 
        $_SESSION['erro'] = 'CNPJ inválido'; 
        header("location: ../criar_conta/cadastro.php");
    }

    mysqli_close($conexao);
?>