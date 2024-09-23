<?php
	session_start();
    include_once "../class/venda.DAO.class.php";
    if(!isset($_SESSION['logadoAdm'])){
		header("location=../login.php");
	}

    $id_venda = $_GET['id'];
    $ObjVendaDAO = new vendaDAO();
    $retorno = $ObjVendaDAO->retornarUnico($id_venda);
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
            <button  href="indexadm.php" id="voltar" onclick="window.location.href='indexadm.php'"><img src="../../img-utilitarios/voltar.png"></button>
        </div>
    </header>
    <div id="container">
    <form id="form-prech" action="alterarStatus_ok.php" method="POST">
        <p id=text-form>Atualizar Status Atual</p>
        <input class="inputs" value="<?=$retorno['status']?>" name="status">
        <input value="<?=$id_venda?>" name="id" hidden>
        <button type="submit" class="btn-op" >Atualizar</button>
    </form>
    </div>
</body>
</html>
