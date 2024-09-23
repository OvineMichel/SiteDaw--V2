<?php
	session_start();
    include_once "../../class/cliente.class.php";
    include_once "../../class/cliente.DAO.class.php";
    if(!isset($_SESSION['logadoAdm'])){
		header("location=../login.php");
	}
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $adm = $_POST['adm'];
    $id = $_POST['id'];

$objCliente = new cliente();
$objCliente->setNome($nome);
$objCliente->setEmail($email);
$objCliente->setAdm($adm);
$objCliente->setIdCliente($id);

$objClienteDao = new clienteDAO();
$retorno = $objClienteDao->editar($objCliente);
if($retorno){
    header("location: listar.php?editarok");
      
}
else header("location: listar.php?editarnok");
?>