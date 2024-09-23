<?php
include_once "venda.class.php";

class vendaDAO{
    public function __construct() {
        $this->conexao = 
			new PDO("mysql:host=localhost; dbname=bancoSD","root", "");
    }
public function listar(){
    $sql = $this->conexao->prepare("SELECT * FROM venda");
    $sql->execute();
    return $sql->fetchAll();
}

public function listarPCliente($id){
    $sql = $this->conexao->prepare("SELECT * FROM venda WHERE id_cliente_id = :id");
    $sql->bindValue(":id",$id);
    $sql->execute();
    return $sql->fetchAll();
}

public function listarNovas(){
    $sql = $this->conexao->prepare("SELECT * FROM venda WHERE data = :query");
    $sql->bindValue(":query",date("Y-m-d"));
    $sql->execute();
    return $sql->fetchAll();
}

public function listarAntigas(){
    $sql = $this->conexao->prepare("SELECT * FROM venda WHERE data != :query");
    $sql->bindValue(":query",date("Y-m-d"));
    $sql->execute();
    return $sql->fetchAll();
}

public function retornarUnico($id){
    $sql = $this->conexao->prepare("SELECT * FROM venda WHERE id_venda = :id");
    $sql->bindValue(":id",$id);
    $sql->execute();
    return $sql->fetch();
}

public function alterarStatus($id,$status){
    $sql = $this->conexao->prepare("UPDATE venda SET Status = :status WHERE id_venda = :id");
    $sql->bindValue(":status",$status);
    $sql->bindValue(":id",$id);
    return $sql->execute();
}

    public function inserirVenda(venda $venda){
        $sql = $this->conexao->prepare("INSERT INTO venda(id_cliente_id, pagamento, entrega, data, status) values(:id_cliente_id,:pagamento,:entrega,:data_entrega,:estatus)");
        $sql->bindValue(":id_cliente_id",$venda->getIdClienteId());
        $sql->bindValue(":pagamento",$venda->getPagamento());
        $sql->bindValue(":entrega",$venda->getEntrega());
        $sql->bindValue(":data_entrega",$venda->getData());
        $sql->bindValue(":estatus",$venda->getStatus());
        $sql->execute();
        return $this->conexao->lastinsertId();
    }
}

?>