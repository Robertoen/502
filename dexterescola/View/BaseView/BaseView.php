<?php 

namespace View\BaseView;

class BaseView
{
	private $header 	= 'View/header.php';
	private $footer 	= 'View/footer.php';

	public function render($class, $view, $data = null){
		$container = "View/{$class}/{$view}.php";
		$this->loadPage($container,$data);
	}

	private function loadPage($container,$data){

		if (is_array($data)) {
			extract($data);
		}
	
		include $this->header;
		include $container;
		include $this->footer;
	}

}