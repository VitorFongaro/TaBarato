<?php
    include '../php/conexao.php';
    $nome = @$_POST['Pesquisa'];
    $link = @$_GET['nome'];

    $query = "SELECT produtos.*, mercados.Nome AS NomeMercado 
              FROM produtos 
              JOIN mercados ON produtos.ID_mercado = mercados.ID_Mercado 
              WHERE produtos.Nome = '$nome'  OR produtos.Nome = '$link'
              ORDER BY ISNULL(produtos.Preco), produtos.Nome ASC, produtos.Preco ASC";
    $resultado = mysqli_query($conexao, $query);

    mysqli_close($conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="busca.css">
    <title>Busca de Produto</title>
    <style>
        @keyframes go-back {
            from {
                transform: translateY(420px);
            }

            to {
                transform: translateX(0);
            }
        }

        body {
            margin: 0;
            padding: 0;
            box-sizing: content-box;
            background: linear-gradient(257.56deg, #437de2 0%, #16f9c1 100%);
        }

        .container {
            width: 100%;
            margin: auto;
            margin-top: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        table {
            animation: go-back 1s;
            width: 1000px;
            font-size: 20px;
            border: 0.1px solid black;
        }

        th,
        td {
            padding: 5px;
            border: 1px solid black;
            text-align: center;
            width: 200px;
            background-color: #8A1AD5;
        }

        tr,
        td {
            padding: 5px;
            color: white;
        }

        .header {
            background-color: #023e8a;
            color: #ffffff;
        }

        .failed {
            animation: go-back 1s;
            width: 400px;
            height: 200px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: auto;
            border: 1px solid #8A1AD5;
            background-color: #8A1AD5;
            border-radius: 20px;
            box-shadow: 10px 10px 100px black;
            margin-top: 150px;
        }

        a {
            text-decoration: none;
            color: black;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        }
        
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo"><a href="../TaBarato_inicial/index.php"><img src="img1.png" alt=""></a></div>
        </div>
    </nav>
    <main class="container">
        <?php
        if (mysqli_num_rows($resultado) != 0) {

        ?>
            <div class="container">
                <table>
                    <tr class="tipos_tabela">
                        <th>Produto</th>
                        <th>Preco</th>
                        <th>Última atualização</th>
                        <th>Mercado</th>
                    </tr>
                    <?php
                    while ($linha = mysqli_fetch_array($resultado)) {
                        echo '<tr><td>' . $linha['Nome'] . '</td>';
                        if($linha['Preco'] == NULL or $linha['Preco'] <= 0 or $linha['Quantidade'] <= 0){
                            echo '<td> ---------- </td>';
                            echo '<td> ---------- </td>';
                        }
                        else{
                            echo '<td> R$ ' . $linha['Preco'] . '</td>';
                            echo '<td>' . date('d-m-Y', strtotime($linha['Data'])) . '</td>';
                        }
                        echo '<td>' . $linha['NomeMercado'] . '</td></tr>';
                    }
                    ?>
                </table>
            </div>
        <?php
        } else {
        ?>
            <div class="failed">
                <a href="../TaBarato_inicial/index.php">
                    <h1>Produto não encontrado</h1>
                </a>
            </div>
        <?php
        }
        ?>
    </main>
</body>
</html>