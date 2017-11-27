<?php 
require 'autoload.php';

use Controller\FrontController\FrontController;
if (isset($__GET)) {
	$__GET['r'] = 'index';
}
$controller = new FrontController();
$controller->rodar($_GET['r']);