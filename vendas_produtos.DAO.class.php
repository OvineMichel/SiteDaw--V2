<?php
include_once "vendas_produtos.class.php";
class vendas_produtosDAO{
    public function __construct(){
        $this->conexao = new PDO("mysql:host=localhost; dbname=bancoSD","root","");
    }

    public function inserir(vendas_produto $vp){
        $sql = $this->conexao->prepare("INSERT INTO venda_produto (id_venda_id, id_produto_id, quantidade, valor_unit) values(:id_venda, :id_produto, :quantidade, :valor_unitario)");
        $sql->bindValue(":id_venda", $vp->getIdVendaId());
        $sql->bindValue(":id_produto", $vp->getIdprodutoId());
        $sql->bindValue(":quantidade", $vp->getQuantidade());
        $sql->bindValue(":valor_unitario", $vp->getValorUnitario());
        return $sql->execute();
    }

    public function retornarVendas($id){
        $sql = $this->conexao->prepare("SELECT * FROM venda_produto WHERE id_venda_id = :id");
        $sql->bindValue(':id',$id);
        $sql->execute();
        return $sql->fetchAll();
    }
}
?>