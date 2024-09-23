<?php
include_once "../class/categoria.class.php";
include_once "../class/categoria.DAO.class.php";

$id = $_GET['id_categoria'];

$objCategoriaDAO = new CategoriaDAO();

$retorno = $objCategoriaDAO->excluir($id);

if($retorno){
    header('location: listarCategoria.php?excluirok');
}

else{
    header('location: listarCategoria.php?excluirnok');
}
?>