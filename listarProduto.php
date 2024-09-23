<?php
	session_start();
    include_once "../class/produtos.DAO.class.php";
    if(!isset($_SESSION['logadoAdm'])){
		header("location=../login.php");
	}

    $objProdutoDAO = new produtosDAO();
    $retorno = $objProdutoDAO->listar();
    if(isset($_GET['excluirok'])){
        echo"<script>alert('Produto excluido com sucesso')</script>";
    }
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
        <div id="div-botão-header">
            <button  href="indexadm.php" id="voltar" onclick="window.location.href='../usuarios/adm/indexadm.php'"><img src="../img-utilitarios/voltar.png"></button>
        </div>
    </header>
<br><div class="container-list">
    <?php foreach ($retorno as $query) { ?>
        <div class='form-listar'>
            <p class='top-text'><?= $query['nome_produto'] ?></p>
            <p style='color:green; font-weight:bold;'><?= $query['valor'] ?> R$</p>
            <p id="warning-button" style="width:100px; text-align:center; margin:0;"><?= $query['nome'] ?></p>
            <img style='border-radius:10px;' src='../img/<?= $query['foto'] ?>' width='80' height='80'>
            <a class="btn-op" href="excluirProduto.php?id=<?=$query['id_produto']?>">Excluir</a>
            <a class="btn-op" href="editarProduto.php?id=<?=$query['id_produto']?>">Editar</a>
            <button class='btn-op botao-mais'>Mais</button>
            <div class='div-mais' style='display:none; flex-direction: column; justify-content: center;'>
                <p><?= $query['descricao'] ?></p>
                <p><?php if($query['disponibilidade'])
                echo'<p style="padding: 4px; border-radius: 4px; color:white; background-color: var(--verdep);">Disponivel</p>';
                else echo'<p style="padding: 4px; border-radius: 4px; color:white; background-color: red;">Indisponivel</p>';?>
                <form id="ofertar" method="GET" action="ofertar.php">
                    <div>
                        <label class="label-op">Ofertar %</label>
                        <input type="number" class="inputs "name="opcao-oferta">
                    </div>
                    <input type="number" name="id" value="<?=$query['id_produto']?>"hidden>
                    <button class="btn-op">Ofertar</button>
                </form>
            </div>
        </div>
    <?php } ?>
</div>
