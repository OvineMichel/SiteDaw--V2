<?php
session_start();
	include_once "../class/categoria.class.php";
	include_once "../class/categoria.DAO.class.php";
    if(!isset($_SESSION['logadoAdm'])){
		header("location=../login.php");
	}
    $categoriaDAO = new categoriaDAO();
    $retorno = $categoriaDAO->listar();
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
    <form id="form-prech"action="cadastroProduto_ok.php" method="POST" enctype="multipart/form-data">
        <p id="text-form">Insira os dados do produto</p>
        <select name="categoria">
        <option>Categoria</option>
            <?php
               foreach($retorno as $linha){
                ?>
                <option value="<?=$linha['id_categoria'];?>">
                    <?=$linha['nome'];?>
                </option>
                <?php
            }?>
        </select>
        <div style="display: flex; gap: 4px;">
            <p style="border-radius:4px; text-align:center; color:white; background-color: green; margin:0; width:60px;">Nome</p>
            <input class="inputs" type="text" name="nome"/>
        </div>
        <div style="display: flex; gap: 4px;">
            <p style="border-radius:4px; text-align:center; color:white; background-color: green; margin:0; width:60px;">Preço</p>
            <input class="inputs" type="number" step="0.01" name="preco" />
        </div>
        <div style="display: flex; gap: 4px;">
            <p style="border-radius:4px; text-align:center; color:white; background-color: green; margin:0; width:85px;">Descrição</p>
            <input class="inputs" type="text" name="desc" />
        </div>
        <div>
            <p style="border-radius:4px; text-align:center; color:white; background-color: green; margin:0; width:85px;">Disponivel</p><br>
            <div style="display:flex;">
                <input class="inputs" type="radio" name="disp" value='1'/><p  style="border-radius:4px; text-align:center; color:white; background-color: green; margin:0; width:40px;">Sim</p>
            </div>
            <br>
            <div style="display:flex;">
                <input class="inputs" type="radio" name="disp" value='0'/><p  style="border-radius:4px; text-align:center; color:white; background-color: green; margin:0; width:40px;">Não</p>
            </div>
        </div>
        <div>
            <p style="border-radius:4px; text-align:center; color:white; background-color: green; margin:auto; width:85px;">Foto</p>
            <input class="inputs" type="file" name="foto"/>
        </div>
        <br />
        <button type="submit" class="btn-op">Enviar</button>
    </form>
    </div>
</body>
</html>
