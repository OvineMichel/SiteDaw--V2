
<?php
	session_start();
	include_once "../class/cliente.class.php";
	include_once "../class/cliente.DAO.class.php";
	$email = $_POST["email"];
	$senha = $_POST["senha"];
	
	$objUsuarios = new cliente();
	$objUsuarios->setEmail($email);
	$objUsuarios->setSenha(hash("sha256",$senha));
	
	$objUsuariosDAO = new clienteDAO();
	$retornoADM = $objUsuariosDAO->ChecaADM($objUsuarios);
	$retornoLogin = $objUsuariosDAO->login($objUsuarios);


	
	if($retornoLogin==0){
		header("location: login.php?email");
	}
	else if($retornoLogin==1){
		header("location: login.php?senha");
	}
	else if($retornoADM['adm'] and $retornoLogin){
		$_SESSION["logadoAdm"]=true;
		$_SESSION['id_cliente'] = $retornoLogin['id_cliente'];
		$_SESSION['nome'] = $retornoLogin['nome_cliente'];
		header("location: adm/indexadm.php");
	}
	else if($retornoLogin){
		$_SESSION['logado'] = true;
		$_SESSION['id_cliente'] = $retornoLogin['id_cliente'];
		$_SESSION['nome'] = $retornoLogin['nome_cliente'];
		header("location: ../site/usuario_produtos.php");
	}
?>