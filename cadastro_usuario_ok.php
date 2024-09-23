<?php
	session_start();
	
	include_once "../class/cliente.class.php";
	include_once "../class/cliente.DAO.class.php";
    include_once "../arquivos_seguro/seguranca.php";
    
	$nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $email = $_POST['email'];

    if (senhaCharEsp($senha)) {
        header('Location: cadastro_usuario.php?errochar');
        exit();
    }
    
    if (detectSQL($senha)) {
        header('Location: cadastro_usuario.php?errosql');
        exit();
    }
    
    if (senhaCurto($senha)) {
        header('Location: cadastro_usuario.php?errocurto');
        exit();
    }
	$objCliente = new cliente();
	$objCliente->setNome($nome);
    $objCliente->setSenha(hash("sha256",$_POST['senha']));
    $objCliente->setEmail($email);
    $objCliente->setAdm(false);

	$objClienteDAO =new clienteDAO();
	$retorno = $objClienteDAO->inserir($objCliente);
    if($retorno){
        header('location: ../site/usuario_produtos.php');
        $_SESSION['logado'] = true;
        $_SESSION['id_cliente'] = $retorno;
        $_SESSION['nome'] = $nome;
    }else{
        header('location: ../index.php?cadastrarnok');
    }
	
?>