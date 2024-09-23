<?php
	session_start();
    include_once "../class/produtos.DAO.class.php";
    include_once "../class/categoria.DAO.class.php";

    if(isset($_GET['compra'])){
        if(!isset($_SESSION['carrinho']))
        $_SESSION['carrinho'] = [];

            if(!in_array($_GET['id'],$_SESSION['carrinho'])){
            array_push($_SESSION['carrinho'], $_GET['id']);
            }
        } 

    $objCategoriaDAO = new categoriaDAO();
    $retornoCat = $objCategoriaDAO->listar();
    $objProdutoDAO = new produtosDAO();
    $retorno = $objProdutoDAO->listarPCategoria($_GET['categoria']);
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
    <style>
        .text-categoria{
            background: rgb(255,255,255);
            background: linear-gradient(90deg, rgba(255,255,255,1) 0%, rgba(226,226,226,1) 100%);
            border-radius: 5px;
            padding: 3px;
            margin: 2px;
            width: 80px;
            text-align: center;
            font-family:"lobster";
            color: green;
            overflow-wrap: break-word;
            font-size: 18px;
        }
    </style>
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
    <div id="container-geral">
    <div id="div-botoes">
        <?php
            foreach($retornoCat as $query){?>
            <button class="side-links" onclick="window.location.href='usuario_produtos_categoria.php?categoria=<?=$query['nome']?>'"><?=$query['nome']?></button>
        <?php } ?>
    </div>
<div class="container-list">
    <?php foreach ($retorno as $query) { ?>
        <div class='form-listar'>
            <p class='top-text'><?= $query['nome_produto'] ?></p>
            <p style='color:green; font-weight:bold;'><?= $query['valor'] ?> R$</p>
            <p id="warning-button" style="width:100px; text-align:center; margin:0;"><?= $query['nome'] ?></p>
            <img style='border-radius:10px;' src='../img/<?= $query['foto'] ?>' width='80' height='80'>
            <a class="btn-op" href="?id=<?=$query['id_produto']?>&compra&categoria=<?=$_GET["categoria"]?>">Comprar</a>
            <button class='btn-op botao-mais'>Mais</button>
            <div class='div-mais' style='display:none; flex-direction: column; justify-content: center;'>
                <p><?= $query['descricao'] ?></p>
                <p><?php if($query['disponibilidade'])
                echo'<p style="padding: 4px; border-radius: 4px; color:white; background-color: var(--verdep);">Disponivel</p>';
                else echo'<p style="padding: 4px; border-radius: 4px; color:white; background-color: red;">Indisponivel</p>';?>
            </div>
        </div>
    <?php } ?>
</div>
    </div>
