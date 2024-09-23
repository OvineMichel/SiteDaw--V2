<?php
session_start();
	
	include_once "../class/Produto.class.php";
	include_once "../class/Produtos.DAO.class.php";
	
	if(!isset($_SESSION['logadoAdm'])){
		header("location=../usuarios/login.php");
	}
    $ObjProduto = new produto();
    $ObjProduto->setIdProduto($_GET['id']);
    $ObjProdutoDao = new produtosDAO();
    $retorno = $ObjProdutoDao->excluir($ObjProduto->getIdProduto());
    if($retorno)
    header("location: listarProduto.php?excluirok");
    else
    header("location: listarProduto.php?excluirnok");

?>