<?php
session_start();
include_once "../../class/cliente.class.php";
include_once "../../class/cliente.DAO.class.php";
    if(!isset($_SESSION['logadoAdm'])){
		header("location=../login.php");
	}
    $cliente=$_GET['id_cliente'];
    $objClienteDAO = NEW clienteDAO();
    $retorno = $objClienteDAO->excluir($cliente);
    if($retorno){
        header("location:listar.php?deleteok");
    }
    else{
        header("location:listar.php?deletenok");
    }
?>