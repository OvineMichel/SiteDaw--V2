

<?php
	include_once "cliente.class.php";
	class clienteDAO{
		public function __construct(){
			$this->conexao = 
			new PDO("mysql:host=localhost; dbname=bancoSD","root", "");
		}
		public function login(cliente $cliente){
			$sql = $this->conexao->prepare("
				SELECT * FROM cliente WHERE email = :email
			");
			$sql->bindValue(":email", $cliente->getEmail());
			$sql->execute();
			if($sql->rowCount()>0){
				while($retorno = $sql->fetch()){
					if($cliente->getSenha() == $retorno['senha']){
						return $retorno;//login e senha ok - logar
					}						
				}
				return 1;//senha incorreta
			}
			else{
				return 0;//email nao cadastrado
			}
		}

		public function ChecaADM(cliente $cliente){
			$sql= $this->conexao->prepare("SELECT adm FROM cliente where email = :email and senha= :senha");
			$sql->bindValue(":email",$cliente->getEmail());
			$sql->bindValue(":senha",$cliente->getSenha());
			$sql->execute();
			$retorno = $sql->fetch();
			return $retorno;
		}

		public function alteraSenha(cliente $cliente){
			$sql= $this->conexao->prepare("UPDATE cliente SET senha = :senha WHERE id_cliente = :id");
			$sql->bindValue(":senha",$cliente->getSenha());
			$sql->bindValue(":id",$cliente->getIdCliente());
			return $sql->execute();
		}

		public function checaEmail($email){
			$sql= $this->conexao->prepare("SELECT COUNT(*) AS quantia FROM cliente where email = :email ");
			$sql->bindValue(":email",$email);
			$sql->execute();
			$retorno =$sql->fetch();
			return $retorno;
		}

		public function retornarUnicoEmail($email){
			$sql = $this->conexao->prepare("SELECT id_cliente,senha FROM cliente WHERE email = :email");
			$sql->bindValue(":email", $email);
			$sql->execute();
			$retorno = $sql->fetch();
			return $retorno;
		}

		Public function inserir(cliente $cliente){
			$sql= $this->conexao->prepare("insert into cliente(email,nome_cliente,senha,adm) values(:email, :nome, :senha, :adm)");
			$sql->bindValue(":email",$cliente->getEmail());
			$sql->bindValue(":senha",$cliente->getSenha());
			$sql->bindValue(":nome",$cliente->getNome());
			$sql->bindValue(":adm",$cliente->getAdm());
			$sql->execute();
			return $this->conexao->lastInsertId();
		}
		public function listar(){
			$sql = $this->conexao->prepare("select * from cliente where adm=true");
			$sql->execute();
			return $sql->fetchAll();
		}

		public function excluir($id_cliente){
			$sql = $this->conexao->prepare("DELETE from cliente where id_cliente = :id_cliente");
			$sql->bindValue(":id_cliente",$id_cliente);
			return $sql->execute();
		}

		public function retornarUnico($id_cliente){
			$sql = $this->conexao->prepare("
				SELECT * FROM cliente WHERE id_cliente = :id_cliente
			");
			$sql->bindValue(":id_cliente", $id_cliente);
			$sql->execute();
			return $sql->fetch();
		}
		public function editar(cliente $objCliente){
			$sql = $this->conexao->prepare("UPDATE cliente set nome_cliente=:nome, adm=:adm,email=:email where id_cliente = :id_cliente");
			$sql->bindValue(":nome",$objCliente->getNome());
			$sql->bindValue(":email",$objCliente->getEmail());
			$sql->bindValue(":adm",$objCliente->getAdm());
			$sql->bindValue(":id_cliente", $objCliente->getIdCliente());
			return $sql->execute();
		}

	}
?>