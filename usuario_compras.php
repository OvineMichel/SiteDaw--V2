<?php
	session_start();
    include_once "../class/produtos.DAO.class.php";
    include_once "../class/categoria.DAO.class.php";
    include_once "../class/venda.DAO.class.php";

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
    $retorno = $objProdutoDAO->listar();
    $ObjVendaDAO = new VendaDAO();
    $retornoVenda = $ObjVendaDAO->listarPCliente($_SESSION['id_cliente']);
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
        .input_side{
            color: white;
            background-color: green;
            padding: 5px;
            border-radius: 4px;
        }

        .form-listar{
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 5px;
        }

        .table-head{
            font-family: roboto condensed;
        }

        .table-bd{
            font-family: roboto condensed;
        }

        .th-son{
            background-color: green;
            color: white;
            padding: 10px;
            
        }

        .tb-son{
            padding: 10px;
            border: 2px solid grey;
            border-radius: 4px;
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
    <div class="container-geral">
    <table class="table-listar" style="width: 100%; text-align: center;">
        <thead>
            <tr class="table-head">
                <th class="th-son">Forma de Pagamento</th>
                <th class="th-son">Local de Entrega</th>
                <th class="th-son">Data de Entrega</th>
                <th class="th-son">Status</th>
                <th class="th-son">Ação</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($retornoVenda as $linha){ ?>
            <tr class="table-bd">
                <td class="tb-son"><?=$linha["pagamento"]?></td>
                <td class="tb-son"><?=$linha["entrega"]?></td>
                <td class="tb-son"><?=$linha["data"]?></td>
                <td class="tb-son"><?=$linha["status"]?></td>
                <td class="tb-son">
                <a href="usuario_compras_produtos.php?id=<?=$linha['id_venda']?>" class="btn-op" >Ver Produtos</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>