<?php
session_start();
    include_once "../class/cliente.class.php";
	include_once "../class/cliente.DAO.class.php";
    if(!isset($_SESSION['logadoAdm'])){
		header("location=../login.php");
	}
    $clienteDAO = new clienteDAO();
    $email = $_POST['email'];
    $retorno = $clienteDAO->checaEmail($email);

    if($retorno['quantia']){
    $retorno = $clienteDAO->retornarUnicoEmail($email);
    $_SESSION['id_cliente'] = $retorno['id_cliente'];
    header('location: alterarSenha.php');
    }
    else
    header('location: ../index.php?emailnok');

?>