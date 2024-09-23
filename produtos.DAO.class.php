<?php
	include_once "produto.class.php";
	class ProdutoSDAO{
		public function __construct(){
			$this->conexao = 
			new PDO("mysql:host=localhost; dbname=BANCOsd", 
			"root", "");
		}
		
		
		public function inserir(Produto $produto){
			$sql= $this->conexao->prepare(
			"INSERT INTO produto (valor, nome_produto, id_categoria_id, foto, descricao, disponibilidade) VALUES 
			(:preco, :nome, :idcategorias, :foto, :descricao, :disponibilidade)");
			$sql->bindValue(":preco", $produto->getValor());
			$sql->bindValue(":nome", $produto->getNomeProduto());
			$sql->bindValue(":idcategorias", $produto->getIdCategoriaId());
			$sql->bindValue(":foto", $produto->getFoto());
			$sql->bindValue(":descricao", $produto->getDescricao());
			$sql->bindValue(":disponibilidade", $produto->getDisponibilidade());
			return $sql->execute();
		}
		
		public function listar(){
			$sql= $this->conexao->prepare(
			"select produto.*, categoria.* from produto inner join categoria on produto.id_categoria_id = categoria.id_categoria");
			$sql->execute();
			return $sql->fetchAll();
		}

		public function listarPCategoria($categoria){
			$sql= $this->conexao->prepare(
			"select produto.*, categoria.* from produto inner join categoria on produto.id_categoria_id = categoria.id_categoria where categoria.nome = :categoria");
			$sql->bindValue(":categoria", $categoria);
			$sql->execute();
			return $sql->fetchAll();
		}

		public function listarPNomeDesc($pesquisa){
			$pesquisa = "%{$pesquisa}%";
			$sql = $this->conexao->prepare(
				"SELECT produto.*, categoria.* 
				 FROM produto 
				 INNER JOIN categoria ON produto.id_categoria_id = categoria.id_categoria 
				 WHERE produto.nome_produto LIKE :pesq 
				 OR produto.descricao LIKE :pesq"
			);
			$sql->bindValue(":pesq", $pesquisa);
			$sql->execute();
			return $sql->fetchAll();
		}
		

		public function excluir($id){
			$sql= $this->conexao->prepare(
			"delete from produto where id_produto = :id");
			$sql->bindValue(":id",$id);
			return $sql->execute();
		}

		public function retornarUnico($id){
			$sql= $this->conexao->prepare(
			"select * from produto where id_produto = :id");
			$sql->bindValue(":id",$id);
			$sql->execute();
			return $sql->fetch();
		}

		public function ofertar($id,$valor){
			$sql= $this->conexao->prepare(
			"update produto set valor = valor - (valor * (:valor/100)) where id_produto = :id");
			$sql->bindValue(":id",$id);
			$sql->bindValue(":valor",$valor);
			return $sql->execute();
		}
		
		public function editar(produto $produto){
			$sql= $this->conexao->prepare(
			"update produto set nome_produto = :nome, descricao = :desc, disponibilidade = :disp, valor = :preco, id_categoria_id = :categoria where id_produto = :id");
			$sql->bindValue(":id",$produto->getIdProduto());
			$sql->bindValue(":nome",$produto->getNomeProduto());
			$sql->bindValue(":desc",$produto->getDescricao());
			$sql->bindValue(":disp",$produto->getDisponibilidade());
			$sql->bindValue(":preco",$produto->getValor());
			$sql->bindValue(":categoria",$produto->getIdCategoriaId());
			return $sql->execute();
		}

		public function retornarNome($id){
			$sql= $this->conexao->prepare(
			"SELECT nome_produto FROM produto WHERE id_produto = :id");
			$sql->execute();
			return $sql->fetch();
		}

	
	}
?>