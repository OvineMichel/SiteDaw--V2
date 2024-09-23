<?php
	session_start();
	
	include_once "../class/Produto.class.php";
	include_once "../class/Produtos.DAO.class.php";
	
	if(!isset($_SESSION['logadoAdm'])){
		header("location=../usuarios/login.php");
	}
	
	$nome = $_POST['nome'];
	$preco = $_POST['preco'];
	$disp = $_POST['disp'];
	$desc = $_POST['desc'];
	$idcategoria = $_POST['categoria'];
	
	$nomefoto = $_FILES['foto']['name'];
	$tmpfoto = $_FILES['foto']['tmp_name'];
	$direcao = "../img/".$nomefoto;
	if(move_uploaded_file($tmpfoto, $direcao))
		echo "sucesso foto";
	else
		echo "insucesso foto";
	
	$objUsuario = new Produto();
	$objUsuario->setNomeProduto($nome);
	$objUsuario->setValor($preco);
	$objUsuario->setFoto($nomefoto);
	$objUsuario->setIdCategoriaId($idcategoria);
	$objUsuario->setDisponibilidade($disp);
	$objUsuario->setDescricao($desc);
	
	$objUsuarioDAO =new produtosDAO();
	$retorno = $objUsuarioDAO->inserir($objUsuario);

    if($retorno){
        header('location: ../usuarios/adm/indexadm.php?cadastrarok');
    }else{
        header('location: ../usuarios/adm/indexadm.php?cadastrarnok');
    }
	
?>