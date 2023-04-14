<?php
  include '../php/conexao.php';

  $id = $_GET['id'];

  $query = "SELECT Nome
            FROM mercados
            WHERE ID_Mercado = '$id'";
  $resultado = mysqli_query($conexao, $query);
  $nome = mysqli_fetch_array($resultado);

  $query = "SELECT * 
            FROM produtos
            WHERE ID_Mercado = '$id'
            ORDER BY Nome ASC";
  $resultado = mysqli_query($conexao, $query);
  
  mysqli_close($conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="admin.css" />
    <title>ADMIN</title>
  </head>
  <body>
    <div id="container">
      <a href="../TaBarato_inicial/index.php">
        <nav class="barra">
          <img
            src="imagens/logo.png"
            alt="logo da marca TaBarato"
            style="width: 297px; height: 60px"
          />
      </a>
      </nav>
      <div class="header">
        <div class="welcome">
          <h1>Bem - Vindo</h1>
          <h1><?php echo $nome['Nome']; ?></h1>
        </div>
      </div>

      <div class="admin">
  
          <table class="table tb_a">
            <thead>
              <th>Nome do produto</th>
              <th id="thcnpj">Preço</th>
              <th>Quantidade</th>
              <th></th>
            </thead>
            <tbody>
              <?php
                
                while($linha = mysqli_fetch_array($resultado)){
                  echo '<input type="hidden" name="id" value="' . $linha['ID_Mercado'] . '">';
                  echo '<tr><td>' . $linha['Nome'] . '</td>';
                  echo '<td>' . $linha['Preco'] . '</td>';
                  echo '<td>' . $linha['Quantidade'];
                  echo '<td><a href="../edita_mercado/edita.php?ip=' . $linha['ID_Produto'] . '&im=' . $linha['ID_Mercado'] . '"><button class="edit"><img src="imagens/editar.png"/></button></a></td></tr>';
                }
              ?>
              </tr>
            </tbody>
          </table>
        
      </div>
    </div>
  </body>
</html>
