<?php 
include_once "../class/venda.DAO.class.php";
$objVendaDAO = new vendaDAO();
if(isset($_GET['novas'])){
    $retorno = $objVendaDAO->listarNovas();
}elseif(isset($_GET['antigas'])){
    $retorno = $objVendaDAO->listarAntigas();
}else
    $retorno = $objVendaDAO->listar();

    ?>
    <html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="jquery.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,369;1,369&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/style.css">
    <Style>
        .p-listar{
            background-color: green;
            border-radius: 10px;
            color: white;
            padding: 5px;
        }

        .form-listar{
            display: flex;
            flex-direction: column;
            gap: 2px;
            padding: 10px;
            margin: 10px;
            background: rgb(255,255,255);
            background: linear-gradient(90deg, rgba(255,255,255,1) 0%, rgba(228,228,228,1) 100%);
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
        <div id="div-botão-header">
            <button style="cursor: pointer;"  href="indexadm.php" id="voltar" onclick="window.location.href='../usuarios/adm/indexadm.php'"><img src="../img-utilitarios/voltar.png"></button>
            <button class="btn-op" onclick="window.location.href='listarVenda.php?novas'">Vendas novas</button>
            <button class="btn-op" onclick="window.location.href='listarVenda.php?antigas'">Vendas passadas</button>
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
            <?php foreach($retorno as $linha){ ?>
            <tr class="table-bd">
                <td class="tb-son"><?=$linha["pagamento"]?></td>
                <td  class="tb-son"><?=$linha["entrega"]?></td>
                <td  class="tb-son"><?=$linha["data"]?></td>
                <td  class="tb-son"><?=$linha["status"]?></td>
                <td  class="tb-son">
                    <a class="btn-op" href="alterarStatus.php?id=<?=$linha['id_venda']?>">Alterar o Status</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
