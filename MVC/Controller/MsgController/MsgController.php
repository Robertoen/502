<?php 
namespace Controller\MsgController;

class MsgController 
{
	public function executar() {
		$model = new MsgModel();
		$msg = $model->getMsg();

		$view = new MsgView();
		$view->render();
	}
}