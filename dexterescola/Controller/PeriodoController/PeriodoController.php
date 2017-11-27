<?php 

namespace Controller\PeriodoController;

use View\BaseView\BaseView;
use Model\Periodo\Periodo;

class PeriodoController
{
	public static function home(){
		$periodos = Periodo::all();
		$view = new BaseView();
		$view->render('Periodo','index',[
			'periodos' => $periodos
		]);
	}
	public static function new(){
		$view = new BaseView();
		$view->render('Periodo','new');
	}
	public static function edit(){
		$periodo = Periodo::find($_GET['id']);
		$view = new BaseView();
		$view->render('Periodo','edit',['periodo' => $periodo]);
	}
	// public static function save(){		
	// 	if (isset($_POST['id'])) {
	// 		$periodo = Periodo::find($_POST['id']);
	// 	} else{
	// 		$periodo = new Periodo();
	// 	}
	// 	$periodo->setDescricao($_POST['descricao']);
	// 	$periodo->save();
		
	// }
	public static function insert(){
		$periodo = new Periodo();
		$periodo->setDescricao($_POST['descricao']);
		$periodo->insert();

		header("location:?r=periodos");
	}
	public static function update(){
		$periodo = Periodo::find($_POST['id']);
		$periodo->setDescricao($_POST['descricao']);
		$periodo->update();

		header("location:?r=periodos");
	}
	public static function delete(){
		$periodo = Periodo::find($_POST['id']);
		$periodo->delete();

		header("location:?r=periodos");
	}
}