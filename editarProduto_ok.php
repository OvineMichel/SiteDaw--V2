<?php
	session_start();
    include_once "../class/Produto.class.php";
	include_once "../class/Produtos.DAO.class.php";
    if(!isset($_SESSION['logadoAdm'])){
		header("location=../login.php");
	}

    $idproduto = $_POST['id_produto'];
    $preco = $_POST['preco'];
    $desc = $_POST['desc'];
    $nome = $_POST['nome'];
    $disp = $_POST['disp'];
    $categoria = $_POST['categoria'];
    $objProduto = new produto();
    $objProduto->setIdProduto($idproduto);
    $objProduto->setNomeProduto($nome);
    $objProduto->setDescricao($desc);
    $objProduto->setDisponibilidade($disp);
    $objProduto->setValor($preco);
    $objProduto->setIdCategoriaId($categoria);

    $objProdutoDAO = new produtosDAO();
    $retorno = $objProdutoDAO->editar($objProduto);
    if($retorno)
    header("location: listarProduto.php?editarok");
    else
    header("location: listarProduto.php?editarnok");
    ?>