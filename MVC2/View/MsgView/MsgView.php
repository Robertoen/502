<?php 
namespace View\MsgView;

use Model\MsgModel\MsgModel;

class
{
	public function render(MsgModel $msg) {
		echo $msg->getMsg();
	}
}