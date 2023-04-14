<?php
    include '../php/conexao.php';
    $query = "SELECT DISTINCT(Nome) FROM produtos ORDER BY Nome ASC";
    $resultado = mysqli_query($conexao, $query);
    $produtos = array();

    while($linha = mysqli_fetch_array($resultado)){
        $produtos[] = $linha['Nome'];
    }

    mysqli_close($conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Tá Barato</title>
</head>
<body>
    <nav class="navbar">
        <div class="logo"><a href="#"><img src="img/img1.png" alt=""></a></div>
        <div class="log_reg">
            
            <div class="login"><a href="../login/login.php">ENTRAR OU CADASTRAR</div>
            <img src="img/login-alt.png" class="img_logo">
        </a>
        </div>
    </nav>
    <header class="content">
        <div class="title"><h1>Procure pelos melhores preços de produtos<br>
            nos mais diversos supermecados</h1>
        </div>
        <div class="search-box">
            <form action="../busca/busca.php" method="POST" class="form">
            <input type="text" class="search-text" name="Pesquisa" placeholder="Pesquisar..." list="Produtos">
            <datalist id="Produtos">
                <?php foreach ($produtos as $produto){ ?>
                    <option value="<?= $produto ?>"></option>
                <?php } ?>
            </datalist>
            <button type="submit" class="btn">
                <img class="loupe-blue" src="img/loupe-blue.svg">
                <img class="loupe-white" src="img/loupe-white.svg">
            </button>
        </form>
        </div> 
    </header>
    <main class="products">
        <div class="title_products"><h2>Produtos</h2></div>
        <div class="recommend_products">
            <div class="p1">
                <div class="bana s">
                 <a href="../busca/busca.php?nome=Banana"><h3>Banana</h3></a>
                </div>
                <div class="caxi s">
                 <a href="../busca/busca.php?nome=Abacaxi"><h3>Abacaxi</h3></a>
                </div>
                <div class="feijao s">
                 <a href="../busca/busca.php?nome=Feijão"><h3>Feijão</h3></a>
                </div>
             </div>
             <div class="p2">
                 <div class="rango s">
                     <a href="../busca/busca.php?nome=Morango"><h3>Morango</h3></a>
                 </div>
                 <div class="lara s">
                     <a href="../busca/busca.php?nome=Laranja"><h3>Laranja</h3></a>
                 </div>
                 <div class="lima s">
                     <a href="../busca/busca.php?nome=Limão"><h3>Limão</h3></a>
                 </div>
             </div>
        </div>
    </main>
</body>
</html>