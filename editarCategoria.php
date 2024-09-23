<?php
	session_start();
	include_once "../class/categoria.class.php";
	include_once "../class/categoria.DAO.class.php";
    if(!isset($_SESSION['logadoAdm'])){
		header("location=../login.php");
	}

    $id_categoria = $_GET['id_categoria'];
    $objCategoriaDAO = new categoriaDAO();
    $retorno = $objCategoriaDAO->retornarUnico($id_categoria);
    ?>
    <!DOCTYPE html>
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
    <div id="container">
    <form id="form-prech" action="editarCategoria_ok.php" method="GET">
        <p id="text-form">Modifique o nome da categoria</p>
        <input type="text" name="id" value="<?=$retorno['id_categoria'];?>" hidden>
        <input style="margin-top:20px;" class="inputs" type="text" name="nome" value="<?=$retorno['nome'];?>">
        <button type="submit" class="btn-op">Enviar</button>
        <?php
        if(isset($_GET['editarok'])){
            echo "<p style='font-family:roboto condensed; color:green;'>Edição Bem Sucedida</p>";
        }

        if(isset($_GET['editarnok'])){
            echo "<p style='font-family:roboto condensed; color:red;'>Edição Mal Sucedida</p>";
        }
        ?>
    </form>
    </div>
</body>
</html>
