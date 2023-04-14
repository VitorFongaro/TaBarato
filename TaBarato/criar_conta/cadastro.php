<?php
  session_start();

  if(isset($_SESSION['erro'])){
    echo "<script>alert('". $_SESSION['erro'] ."')</script>";
    unset($_SESSION['erro']);
  }
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Criar conta</title>
    <link rel="stylesheet" href="cadastro.css" />
  </head>
  <body>
    <div id="container">
      <div class="barra">
        <a href="../TaBarato_inicial/index.php">
          <img
            src="imagens/logo.png"
            alt="Logo do site"
            style="width: 297px; height: 60px"
          />
        </a>
      </div>
      <div class="signup">
        <div class="signup-content">
          <form action="../php/validaregistro.php" method="POST">
            <div class="flex">
              <label for="empresa-signup">Empresa :</label>
              <input
                type="text"
                name="empresa"
                id="empresa-signup"
                placeholder="Nome da empresa"
                required
                maxlength="99"
              />
            </div>
            <div class="flex">
              <label for="email-signup">E-mail :</label>
              <input
                type="email"
                name="email"
                id="email-signup"
                placeholder="digiteseuemail@aqui.com"
                required
                maxlength="199"
              />
            </div>
            <div class="flex">
              <label for="cnpj">CNPJ :</label>
              <input
                type="text"
                name="cnpj"
                id="cnpj"
                placeholder="Digite seu CNPJ"
                required
              />
            </div>
            <div class="flex">
              <label for="senha-signup">Senha :</label>
              <input
                type="password"
                name="senha"
                id="senha-signup"
                placeholder="Digite sua senha"
                required
                maxlength="59"
              />
            </div>
            <div class="flex">
              <label for="endereco">Endereço :</label>
              <input 
                type="text" 
                name="endereco" 
                id="endereco" 
                placeholder="Digite seu endereço" 
                required
                maxlength="199"
              />
            </div>
            <div class="btn">
              <button type="submit">Criar conta</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </body>
</html>
