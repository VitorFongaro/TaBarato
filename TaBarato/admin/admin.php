<?php
  include '../php/conexao.php';
  $query = "SELECT * 
            FROM mercados 
            ORDER BY ID_Mercado ASC";
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
      <nav class="barra">
        <a href="../TaBarato_inicial/index.php">
        <img
          src="imagens/logo.png"
          alt="logo da marca TaBarato"
          style="width: 297px; height: 60px"
        />
        </a>
      </nav>
      <div class="header">
        <div class="welcome">
          <h1>Bem - Vindo<br />Administrador</h1>
        </div>
      </div>  
      <div class="admin">
          <table class="table tb_a">
            <thead>
              <th></th>
              <th>Nome da empresa</th>
              <th id="thcnpj">CNPJ</th>
              <th>Email cadastrado</th>
              <th>Endereço</th>
              <th></th>
            </thead>
            <tbody>
              <?php 
                while($linha = mysqli_fetch_array($resultado)){
                  echo '<tr><td><a href="../php/deleta.php?id=' . $linha['ID_Mercado'] . '"><button id="delete"><img src="imagens/apagar.png"/></buttton></a></td>';
                  echo '<td>' . $linha['Nome'] . '</td>';
                  echo '<td>' . $linha['CNPJ'] . '</td>';
                  echo '<td>' . $linha['Email'] . '</td>';
                  echo '<td>' . $linha['Endereco'] . '</td>';
                  echo '<td><a href="../edita/edita.php?id=' . $linha['ID_Mercado'] . '"><button class="edit"><img src="imagens/editar.png"/></buttton></a></td></tr>';     
                }
              ?>
            </tbody>
          </table> 
      </div>
    </div>
  </body>
</html>