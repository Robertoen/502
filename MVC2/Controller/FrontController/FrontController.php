<?php 

namespace Controller\FrontController;

use Controller\MsgController\MsgController;

class FrontController
{
	public function rodar($rota) {
		switch ($rota) {
			case 'msg':
				$controller = new MsgController();
				$controller->executar();
				break;
			
			default:
				# code...
				break;
		}
	}
}