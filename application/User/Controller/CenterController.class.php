<?php
namespace User\Controller;

use Common\Controller\MemberbaseController;

class CenterController extends MemberbaseController
{
	function _initialize()
	{
		parent::_initialize();
	}

	public function index()
	{
		$this->assign($this->user);
		$this->display(':center');
	}
} 