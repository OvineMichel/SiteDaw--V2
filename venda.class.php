<?php
class Venda {
    private $id_venda;
    private $id_cliente_id;
    private $pagamento;
    private $entrega;
    private $data;

   
    public function getIdVenda() {
        return $this->id_venda;
    }

    public function setIdVenda($id_venda) {
        $this->id_venda = $id_venda;
    }

  
    public function getIdClienteId() {
        return $this->id_cliente_id;
    }

    public function setIdClienteId($id_cliente_id) {
        $this->id_cliente_id = $id_cliente_id;
    }

    public function getPagamento() {
        return $this->pagamento;
    }

    public function setPagamento($pagamento) {
        $this->pagamento = $pagamento;
    }

    
    public function getEntrega() {
        return $this->entrega;
    }

    public function setEntrega($entrega) {
        $this->entrega = $entrega;
    }

   
    public function getData() {
        return $this->data;
    }

    public function setData($data) {
        $this->data = $data;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
}
?>