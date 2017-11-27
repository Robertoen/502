<?php 

namespace Controller\AlunoController;

use View\BaseView\BaseView;
use Model\Aluno\Aluno;

class AlunoController
{
	public static function home(){
		$alunos = Aluno::all();
		$view = new BaseView();
		$view->render('Aluno','index',[
			'alunos' => $alunos
		]);
	}
	public static function new(){
		$view = new BaseView();
		$view->render('Aluno','new');
	}
	public static function edit(){
		$aluno = Aluno::find($_GET['id']);
		$view = new BaseView();
		$view->render('Aluno','edit',['aluno' => $aluno]);
	}
	public static function insert(){
		$aluno = new Aluno();
		$aluno->setNome($_POST['nome']);
		$aluno->setEmail($_POST['email']);
		$aluno->setSenha($_POST['senha']);
		$aluno->setCpf($_POST['cpf']);
		$aluno->setRg($_POST['rg']);
		$aluno->setDtNasc($_POST['dt_nasc']);
		$aluno->insert();

		header("location:?r=alunos");
	}
	public static function update(){
		$aluno = Aluno::find($_POST['id']);
		$aluno->setNome($_POST['nome']);
		$aluno->setEmail($_POST['email']);
		$aluno->setSenha($_POST['senha']);
		$aluno->setCpf($_POST['cpf']);
		$aluno->setRg($_POST['rg']);
		$aluno->setDtNasc($_POST['dt_nasc']);
		$aluno->update();

		header("location:?r=alunos");
	}
	public static function delete(){
		$aluno = Aluno::find($_POST['id']);
		$aluno->delete();

		header("location:?r=alunos");
	}
}