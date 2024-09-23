<?php
class cliente{
    private $id_cliente;
    private $email;
    private $senha;
    private $nome;
    private $adm;

    // Métodos get
    public function getIdCliente() {
        return $this->id_cliente;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getNome() {
        return $this->nome;
    }

    // Métodos set
    public function setIdCliente($id_cliente) {
        $this->id_cliente = $id_cliente;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setAdm($adm) {
        $this->adm = $adm;
    }

    public function getAdm() {
        return $this->adm;
    }
}
?>
