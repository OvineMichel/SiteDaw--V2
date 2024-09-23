<?php
include_once "../class/categoria.class.php";
include_once "../class/categoria.DAO.class.php";

$nome = $_POST['nome'];
$objCategoria = new categoria();
$objCategoria->setNomeCategoria($nome);
$objCategoriaDAO = new categoriaDAO();
$retorno = $objCategoriaDAO->adicionar($objCategoria);
if($retorno){
    header('location: listarCategoria.php?adicionado');
}
else{
    header('location: adicionarCategoria.php?error');
}
?>