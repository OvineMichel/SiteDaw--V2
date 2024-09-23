<?php
session_start();
if(!$_SESSION['logado'])
header("location: ../usuarios/login.php");
?>  
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../operacoes/jquery.js"></script>
    <script src="../operacoes/operacoes.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,369;1,369&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>
    <header>
        <div>
            <h1 id="titulo">Boutique Elegance</h1>
        </div>
        <div>
        <button style="font-size: 11px;" class="btn-op" onclick="window.location.href='usuario_compras.php'">Minhas Compras</button>
            <a id="carrinho" style="width:auto;"href="carrinho.php">Carrinho de compras</a>
            <form action="usuario_produtos_pesquisa.php" method="GET">
                <input type="text" name="pesquisa" class="inputs">
                <button class="btn-op">Procurar</button>
            </form>
        </div>
    </header>
<br><div>
    <?php
    if(!isset($_SESSION['carrinho'])){
        echo "<h2>Não há nada em seu carrinho</h2>";
    }
    else{
        include_once "../class/produto.class.php";
        include_once "../class/produtos.DAO.class.php";
        $produtoDAO = new produtosDAO();
        ?>
        <form action="carrinho_ok.php" method="POST" class="container-list">
            <?php
        foreach($_SESSION['carrinho'] as $query){
            $retorno = $produtoDAO->retornarUnico($query);
            ?>
            <div class="form-listar">
            <p class="top-text"><?=$retorno['nome_produto']?></p>
            <p style='color:green; font-weight:bold;'>R$ <?=$retorno['valor']?></p>
            <p  id="warning-button" style="width:auto; text-align:center; margin:0; padding:2px;"><?=$retorno['descricao']?></p>
            <img src="../img/<?=$retorno['foto']?>" width="80" height="80"/>
            <p><?php if($retorno['disponibilidade'])
                echo'<p style="padding: 4px; border-radius: 4px; color:white; background-color: var(--verdep);">Disponivel</p>';
                else echo'<p style="padding: 4px; border-radius: 4px; color:white; background-color: red;">Indisponivel</p>';?>
            <p> Quantidade: <input class="inputs" type="number" name="quantidade<?=$retorno['id_produto']?>" value="1"></p>
        </div>
            <?php
        }
        ?>
        <div>
            <p style="font-family: roboto condensed"> Local de entrega: <input class="inputs" type="text" name="entrega"></p>
            <p style="font-family: roboto condensed"> Metodo de pagamento: <input class="inputs" type="text" name="pagamento"></p>
            <button class="btn-op" type="submit">Finalizar Carrinho</button>
        </div>
    </form>
    <?php
    }
    ?>
</div>
