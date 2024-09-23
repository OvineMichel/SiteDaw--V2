<?php
session_start();
if (!isset($_SESSION['logadoAdm'])) {
    header("Location: ../login.php");
    exit();
}

include_once "../../class/cliente.class.php";
include_once "../../class/cliente.DAO.class.php";
include_once "../../arquivos_seguro/seguranca.php";
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

if (senhaCharEsp($senha)) {
    header('Location: cadastro.php?errochar');
    exit();
}

if (detectSQL($senha)) {
    header('Location: cadastro.php?errosql');
    exit();
}

if (senhaCurto($senha)) {
    header('Location: cadastro.php?errocurto');
    exit();
}

$objCliente = new cliente();
$objCliente->setNome($nome);
$objCliente->setEmail($email);
$objCliente->setSenha(hash("sha256",$senha));
$objCliente->setAdm(true);

$objClienteDao = new clienteDAO();
$retorno = $objClienteDao->inserir($objCliente);

if ($retorno) {
    $_SESSION['logadoAdm'] = true;
    $_SESSION['id_cliente'] =  $retorno;
    header("Location: indexadm.php?ok");
    exit();
} else {
    header("Location: cadastro.php?errodb");
    exit();
}
?>
