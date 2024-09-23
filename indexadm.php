<!DOCTYPE html>
<?php
	session_start();
	if(!isset($_SESSION['logadoAdm'])){
		header("location=../login.php");
	}
?>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="jquery.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alex+Brush&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,369;1,369&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../../CSS/style.css">
</head>
<body>
    <header>
        <h1 id="titulo">Boutique Elegance</h1>
    </header>
    <div id="container">
            <form id="form-prech">
                <p id="text-form">Opções para ADM</p>
                <a href="listar.php" class="btn-op">ADM's</a>
                <a href="cadastro.php" class="btn-op">Cadastrar ADM's</a>
                <a href="../../categoria/listarCategoria.php" class="btn-op">Categorias</a>
                <a href="../../categoria/adicionarCategoria.php" class="btn-op">Adicionar Categoria</a>
                <a href="../../produtos/cadastroProduto.php" class="btn-op">Adicionar Produto</a>
                <a href="../../produtos/listarProduto.php" class="btn-op">Produtos</a>
                <a href="../../vendas/listarVenda.php" class="btn-op">Vendas</a>
            </form>
    </div>
</body>
</html>