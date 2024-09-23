<?php
class produto {
    private $id_produto;
    private $id_categoria_id;
    private $valor;
    private $descricao;
    private $nome_produto;
    private $disponibilidade;
    private $foto;

    public function getIdProduto() {
        return $this->id_produto;
    }

    public function setIdProduto($id_produto) {
        $this->id_produto = $id_produto;
    }

    public function getIdCategoriaId() {
        return $this->id_categoria_id;
    }

    public function setIdCategoriaId($id_categoria_id) {
        $this->id_categoria_id = $id_categoria_id;
    }

    public function getValor() {
        return $this->valor;
    }

    public function setValor($valor) {
        $this->valor = $valor;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function getNomeProduto() {
        return $this->nome_produto;
    }

    public function setNomeProduto($nome_produto) {
        $this->nome_produto = $nome_produto;
    }

    public function getDisponibilidade() {
        return $this->disponibilidade;
    }

    public function setDisponibilidade($disponibilidade) {
        $this->disponibilidade = $disponibilidade;
    }

    public function getFoto() {
        return $this->foto;
    }

    public function setFoto($foto) {
        $this->foto = $foto;
    }
}
?>
