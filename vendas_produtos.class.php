<?php
class vendas_produto{
    public $id;
    public $id_produto_id;
    public $id_venda_id;
    public $valor_unitario;
    public $quantidade;
    function getIdVendaId(){
        return $this->id_venda_id;
    }

    function getIdprodutoId(){
        return $this->id_produto_id;
    }

    function getQuantidade(){
        return $this->quantidade;
    }

    function getValorUnitario(){
        return $this->valor_unitario;
    }

    function getId(){
        return $this->id;
    }

    function setIdVendaId($t){
        $this->id_venda_id = $t;
    }

    function setIdProdutoId($t){
        $this->id_produto_id = $t;
    }

    function setQuantidade($t){
        $this->quantidade = $t;
    }

    function setValorUnitario($t){
        $this->valor_unitario = $t;
    }
    
    function setId($t){
        $this->id = $t;
    }
}
?>