<?php
	include_once "categoria.class.php";
	class categoriaDAO{
		public function __construct(){
			$this->conexao = 
			new PDO("mysql:host=localhost; dbname=bancoSD","root", "");
		}
		public function listar(){
            $sql = $this->conexao->prepare("select * from categoria");
			$sql->execute();
			return $sql->fetchAll();
        }
        public function excluir($id){
            $sql = $this->conexao->prepare("delete from categoria where id_categoria = :id");
            $sql->bindValue(':id',$id);
            return $sql->execute();
        }

        public function adicionar(categoria $categoria){
            $sql = $this->conexao->prepare("insert into categoria(nome) values(:nome)");
            $sql->bindValue(':nome',$categoria->getNomeCategoria());
            return $sql->execute();
        }

        public function retornarUnico($id){
            $sql = $this->conexao->prepare("select * from categoria where id_categoria = :id");
            $sql->bindValue(':id',$id);
            $sql->execute();
            return $sql->fetch();
        }

        public function editar(categoria $categoria){
            $sql = $this->conexao->prepare("update categoria set nome = :nome where id_categoria = :id");
            $sql->bindValue(':id',$categoria->getIdCategoria());
            $sql->bindValue(':nome',$categoria->getNomeCategoria());
            return $sql->execute();
        }
	}
?>