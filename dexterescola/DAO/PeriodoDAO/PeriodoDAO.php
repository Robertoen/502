<?php 

namespace DAO\PeriodoDAO;

use DAO\Conexao\Conexao;
use PDO;
use Model\Periodo\Periodo;
use PDOException;


class PeriodoDAO
{

	private $con = null;

	public function __construct(){
		$this->con = Conexao::getInstance();
	}

	public function all(){

		$prepare = $this->con->query("SELECT * FROM tb_periodos ORDER BY id");
		$prepare->execute();

		$result = $prepare->fetchAll(PDO::FETCH_ASSOC);

		$periodos = [];
		foreach ($result as $item) {			
			 $periodo = new Periodo();
			 $periodo->setId($item['id']);
			 $periodo->setDescricao($item['descricao']);
			 $periodos[] = $periodo;
		}

		return $periodos;
	}

	public function insert(Periodo $periodo){
		$sql = "INSERT INTO tb_periodos (descricao) VALUES (:descricao)";

		strip_tags($periodo->getDescricao());
		trim($periodo->getDescricao());

		try {
			$descricao = $periodo->getDescricao();
			$this->con->beginTransaction();
			$stmt = $this->con->prepare($sql);
			$stmt->bindValue(":descricao", $descricao);

			$stmt->execute();

			$this->con->commit();	
			$_SESSION['sucesso'] = "Salvo Com Sucesso";
		} catch (PDOException $e) {
			$this->con->rollback();
			// $this->log("Erro -> {$e->getMessage()}") ;
			$_SESSION['erro'] = "Erro ao Atualizar Periodo";
		}
	}

	public function update(Periodo $periodo){
		$sql = "UPDATE tb_periodos SET descricao = :descricao WHERE id = :id";

		try {
			$descricao = $periodo->getDescricao();
			$id = $periodo->getId();
			$this->con->beginTransaction();
			$stmt = $this->con->prepare($sql);
			$stmt->bindParam(":descricao", $descricao);
			$stmt->bindParam(":id", $id);

			$stmt->execute();

			$this->con->commit();
			$_SESSION['sucesso'] = "Atualizado Com Sucesso";	
		} catch (PDOException $e) {
			$this->con->rollback();
			// $this->log("Erro -> {$e->getMessage()}") ;
			$_SESSION['erro'] = "Erro ao Atualizar Periodo";
		}
	}

	public function delete(Periodo $periodo){
		$sql = "DELETE FROM tb_periodos WHERE id = :id";

		try {
			$id = $periodo->getId();
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
		$sql = "SELECT * FROM tb_periodos WHERE id = :id";

		$stmt = $this->con->prepare($sql);
		$stmt->bindParam(":id", $id);

		$stmt->execute();
		$result = $stmt->fetch(PDO::FETCH_ASSOC);

		 $periodo = new Periodo();
		 $periodo->setId($result['id']);
		 $periodo->setDescricao($result['descricao']);

		return $periodo;
	}
}