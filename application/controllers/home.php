<?php

class home extends Controller {

	public function __construct() {
		
		parent::__construct();
	}

	public function index() {
		
		$this->view('flat/Home/index');
	}

	public function flat() {

		$params = (func_get_args());
		// Remove url query from params
		unset($params[0]);

		$params = array_filter($params);
		$path = 'flat/' . implode('/', $params);
		$this->view($path);

		// $path = 'flat/' . implode('/', $params);
		// $this->view($path);
	}
}

?>