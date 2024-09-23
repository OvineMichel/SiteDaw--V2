<?php
session_start();
include_once "../class/Produto.class.php";
include_once "../class/Produtos.DAO.class.php";
if(!isset($_SESSION['logadoAdm'])){
    header("location=../login.php");
}
$id = $_GET['id'];
$valor = $_GET['opcao-oferta'];
$ObjProdutoDAO = new produtosDAO();
$retorno = $ObjProdutoDAO->ofertar($id,$valor);
if($retorno)
    header("location: listarProduto.php?ofertarok");
else
    header("location: listarProduto.php?ofertarnok");
