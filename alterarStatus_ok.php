<?php
include_once "../class/venda.DAO.class.php";
$ObjVendaDao = new vendaDAO();
$retorno = $ObjVendaDao->alterarStatus($_POST['id'],$_POST['status']);
if($retorno)
header("location: ../usuarios/adm/indexadm.php?alterarStatusOK");
else 
header("location: ../usuarios/adm/indexadm.php?alterarStatusNOK");
?>