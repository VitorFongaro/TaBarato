<?php
  include '../php/conexao.php';

  $id_produto = $_GET['ip'];
  $id_mercado = $_GET['im'];

  $query = "SELECT Nome
            FROM mercados
            WHERE ID_Mercado = '$id_mercado'";
  $resultado = mysqli_query($conexao, $query);
  $nome = mysqli_fetch_array($resultado);

  $query = "SELECT *
            FROM produtos
            WHERE ID_Produto = '$id_produto' AND ID_Mercado = '$id_mercado'";
  $resultado = mysqli_query($conexao, $query);
  $linha = mysqli_fetch_array($resultado);

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
          <a href="../admin_mercado/admin.php?id=<?php echo $id_mercado; ?>" style="text-decoration:none;color:white; flex-direction:column;">
            <h1>Bem - Vindo</h1>
            <h1><?php echo $nome['Nome']; ?></h1>
          </a>
        </div>
      </div>
      <div class="admin">
        <form action="../php/edita_mercado.php" method="POST">
          <table class="table tb_a">
            <thead>
              <th>Nome do produto</th>
              <th id="thcnpj">Preço</th>
              <th>Quantidade</th>
            </thead>
            <tbody>
              <tr>
                <input type="hidden" name="im" value="<?php echo $linha['ID_Mercado']; ?>">
                <input type="hidden" name="ip" value="<?php echo $linha['ID_Produto']; ?>">
                <td><?php echo $linha['Nome']; ?></td>
                <td><input type="text" name="preco" value="<?php echo $linha['Preco']; ?>"></td>
                <td><input type="number" name="quantidade" value="<?php echo $linha['Quantidade']; ?>" min="0"></td>
                <td><button type="submit" class="edit"><img src="imagens/editar.png"></button></td>
              </tr>
            </tbody>
          </table>
        </form>
      </div>
    </div>
  </body>
</html>
