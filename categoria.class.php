<?php 
class categoria{
    private $id_categoria;
    private $nome;


public function getIdCategoria(){
    return $this->id_categoria;
}

public function setIdCategoria($id){
    $this->id_categoria = $id;
}

public function getNomeCategoria(){
    return $this->nome;
}

public function setNomeCategoria($nome){
    $this->nome = $nome;
}
}
?>