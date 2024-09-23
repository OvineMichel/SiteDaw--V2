<?php 
include_once "../../class/cliente.class.php";
include_once "../../class/cliente.DAO.class.php";

$objClienteDAO = new clienteDAO();
$retorno = $objClienteDAO->listar();
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
        <div>
            <h1 id="titulo">Boutique Elegance</h1>
        </div>
        <div id="div-botão-header">
            <button  href="indexadm.php" id="voltar" onclick="window.location.href='indexadm.php'"><img src="../../img-utilitarios/voltar.png"></button>
        </div>
    </header>
    <div class="container-list">
    <?php foreach($retorno as $linha){?>
    <form class="form-listar" style="text-align: center;">
        <h3 style="background-color:rgb(57, 157, 18); width:100%; color:white; border-top-left-radius: 10px; border-top-right-radius: 10px;"><?=$linha["nome_cliente"]?></h3>
        <p><?=$linha["email"]?></p>
        <p hidden><?=$linha["senha"]?></p>
        <a class="btn-op" href='excluir.php?id_cliente=<?=$linha["id_cliente"]?>'>excluir</a>
        <a class="btn-op" href='editar.php?id_cliente=<?=$linha["id_cliente"]?>'>Editar</a>
    </form>
        <?php }
        if(isset($_GET['editarok'])){
    echo "<script>alert('Edição bem sucedida')</script>";
}
if(isset($_GET['editarnok'])){
    echo "<script>alert('Erro ao editar')</script>";
}
if(isset($_GET['deleteok'])){
    echo "<script>alert('Delete bem sucedido')</script>";
}

if(isset($_GET['deletenok'])){
    echo "<script>alert('Erro ao deletar')</script>";
}
?>