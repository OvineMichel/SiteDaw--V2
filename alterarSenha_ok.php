
<?php
session_start();
    include_once "../class/cliente.class.php";
	include_once "../class/cliente.DAO.class.php";
    include_once "../arquivos_seguro/seguranca.php";
    if(!isset($_SESSION['logadoAdm'])){
		header("location=../login.php");
	}

    $id = $_POST['id'];
    $senha = $_POST['senha'];

    if (senhaCharEsp($senha)) {
        header('Location: alterarSenha.php?errochar');
        exit();
    }
    
    if (detectSQL($senha)) {
        header('Location: alterarSenha.php?errosql');
        exit();
    }
    
    if (senhaCurto($senha)) {
        header('Location: alterarSenha.php?errocurto');
        exit();
    }
    $cliente = new cliente();
    $cliente->setSenha($senha);
    $cliente->setIdCliente($id);
    $clienteDAO = new clienteDAO();
    $operacao = $clienteDAO->alteraSenha($cliente);
    if($operacao)
    header('location:../index.php?senhaok');
    else
    header('location: ../index.php?senhanok');
?>