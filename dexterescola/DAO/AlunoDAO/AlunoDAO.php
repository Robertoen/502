<?php 

namespace DAO\AlunoDAO;

use DAO\Conexao\Conexao;
use PDO;
use Model\Aluno\Aluno;
use PDOException;


class AlunoDAO
{

	private $con = null;

	public function __construct(){
		$this->con = Conexao::getInstance();
	}

	public function all(){

		$prepare = $this->con->query("SELECT * FROM tb_alunos ORDER BY id");
		$prepare->execute();

		$result = $prepare->fetchAll(PDO::FETCH_ASSOC);

		$alunos = [];
		foreach ($result as $item) {			
			 $aluno = new Aluno();
			 $aluno->setId($item['id']);
			 $aluno->setNome($item['nome']);
			 $aluno->setEmail($item['email']);
			 $aluno->setSenha($item['senha']);
			 $aluno->setCpf($item['cpf']);
			 $aluno->setRg($item['rg']);
			 $aluno->setDtNasc($item['dt_nasc']);
			 $alunos[] = $aluno;
		}

		return $alunos;
	}

	public function insert(Aluno $aluno){
		$sql = "INSERT INTO tb_alunos (nome,email,senha,cpf,rg,dt_nasc) VALUES (:nome,:email,:senha,:cpf,:rg,:dt_nasc)";

		try {
			$nome = $aluno->getNome();
			$email = $aluno->getEmail();
			$senha = $aluno->getSenha();
			$cpf = $aluno->getCpf();
			$rg = $aluno->getRg();
			$dt_nasc = $aluno->getDtNasc();
			$this->con->beginTransaction();
			$stmt = $this->con->prepare($sql);
			$stmt->bindParam(":nome", $nome);
			$stmt->bindParam(":email", $email);
			$stmt->bindParam(":senha", $senha);
			$stmt->bindParam(":cpf", $cpf);
			$stmt->bindParam(":rg", $rg);
			$stmt->bindParam(":dt_nasc", $dt_nasc);

			$stmt->execute();

			$this->con->commit();	
			$_SESSION['sucesso'] = "Salvo Com Sucesso";
		} catch (PDOException $e) {
			$this->con->rollback();
			// $this->log("Erro -> {$e->getMessage()}") ;
			$_SESSION['erro'] = "Erro ao Atualizar Periodo";
		}
	}

	public function update(Aluno $aluno){
		$sql = "UPDATE tb_alunos SET nome = :nome, email = :email,senha = :senha,cpf = :cpf,rg = :rg WHERE id = :id";

		try {
			$id = $aluno->getId();
			$nome = $aluno->getNome();
			$email = $aluno->getEmail();
			$senha = $aluno->getSenha();
			$cpf = $aluno->getCpf();
			$rg = $aluno->getRg();
			// $dt_nasc = $aluno->getDtNasc();

			$this->con->beginTransaction();
			$stmt = $this->con->prepare($sql);

			$stmt->bindParam(":nome", $nome);
			$stmt->bindParam(":email", $email);
			$stmt->bindParam(":senha", $senha);
			$stmt->bindParam(":cpf", $cpf);
			$stmt->bindParam(":rg", $rg);
			// $stmt->bindParam(":dt_nasc", $dt_nasc);
			$stmt->bindParam(":id", $id);

			$stmt->execute();
			$this->con->commit();
			$_SESSION['sucesso'] = "Atualizado Com Sucesso";	
		} catch (PDOException $e) {
			$this->con->rollback();
			// $this->log("Erro -> {$e->getMessage()}") ;
			print_r($e->getMessage());
			die();
			$_SESSION['erro'] = "Erro ao Atualizar Periodo";
		}
	}

	public function delete(Aluno $aluno){
		$sql = "DELETE FROM tb_alunos WHERE id = :id";

		try {
			$id = $aluno->getId();
			$this->con->beginTransaction();
			$stmt = $this->con->prepare($sql);
			$stmt->bindParam(":id", $id);

			$stmt->execute();

			$this->con->commit();
			$_SESSION['sucesso'] = "Excluido Com Sucesso";	
		} catch (PDOException $e) {
			$this->con->rollback();
			// $this->log("Erro -> {$e->getMessage()}") ;
			$_SESSION['erro'] = "Erro ao Excluir Periodo";
		}
	}

	public function find($id){
		$sql = "SELECT * FROM tb_alunos WHERE id = :id";

		$stmt = $this->con->prepare($sql);
		$stmt->bindParam(":id", $id);

		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		 $aluno = new Aluno();
		 $aluno = new Aluno();
		 $aluno->setId($result['id']);
		 $aluno->setNome($result['nome']);
		 $aluno->setEmail($result['email']);
		 $aluno->setSenha($result['senha']);
		 $aluno->setCpf($result['cpf']);
		 $aluno->setRg($result['rg']);
		 $aluno->setDtNasc($result['dt_nasc']);

		return $aluno;
	}
}