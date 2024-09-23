<?php
session_start();
	include_once "../class/categoria.class.php";
	include_once "../class/categoria.DAO.class.php";
    if(!isset($_SESSION['logadoAdm'])){
		header("location=../login.php");
	}

    $id = $_GET['id'];
    $nome = $_GET['nome'];
    $categoria = new categoria();
    $categoria->setIdCategoria($id);
    $categoria->setNomeCategoria($nome);
    
    $ObjCategoriaDao = new categoriaDAO();
    $retorno = $ObjCategoriaDao->editar($categoria);
    if($retorno){
        header('location: listarCategoria.php?editarok');
    }
    else{
        header('location: listarCategoria.php?editarnok');
    }

    ?>