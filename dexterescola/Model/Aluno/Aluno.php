<?php 

namespace Model\Aluno;

use DAO\AlunoDAO\AlunoDAO;

class Aluno
{
	private $id;
	private $nome;
	private $email;
	private $senha;
	private $cpf;
	private $rg;
	private $dt_nasc;

	public function __construct(){
	}

	public function setId($id){
		$this->id = $id;
	}
	public function getId(){
		return $this->id;
	}

	public function setNome($nome){
		$this->nome = $nome;
	}
	public function getNome(){
		return $this->nome;
	}
	public function setEmail($email){
		$this->email = $email;
	}
	public function getEmail(){
		return $this->email;
	}
	public function setSenha($senha){
		$this->senha = $senha;
	}
	public function getSenha(){
		return $this->senha;
	}
	public function setCpf($cpf){
		$this->cpf = $cpf;
	}
	public function getCpf(){
		return $this->cpf;
	}
	public function setRg($rg){
		$this->rg = $rg;
	}
	public function getRg(){
		return $this->rg;
	}
	public function setDtNasc($dt_nasc){
		$this->dt_nasc = $dt_nasc;
	}
	public function getDtNasc(){
		return $this->dt_nasc;
	}

	// public function save(){
	// 	$dao = new AlunoDAO();
	// 	if (is_null($this->id)) {
	// 		$dao->insert($this);
	// 	} else {
	// 		$dao->update($this);
	// 	}
	// }
	
	public function insert(){
		$dao = new AlunoDAO();
		$dao->insert($this);
	}
	public function update(){
		$dao = new AlunoDAO();
		$dao->update($this);
	}
	public function delete(){
		$dao = new AlunoDAO();
		$dao->delete($this);
	}

	public static function find($id){
		$dao = new AlunoDAO();
		return $dao->find($id);
	}

	public static function all(){
		$dao = new AlunoDAO();
		return $dao->all();
	}
}
