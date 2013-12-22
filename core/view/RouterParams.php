<?php

class RouterParams {

	protected $request;
	protected $ctrl_name;
	protected $action;
	protected $id;

	function __construct($request) {
		$this->request = $request;
		$this->parse();
	}

	protected function parse() {
		if (isset($this->request['rt'])) {


			$tokens = explode('/', $this->request['rt']);

			if (isset($tokens[0])) {
				$this->ctrl_name = $tokens[0];
			}

			if (isset($tokens[1])) {
				$this->action = $tokens[1];
			}

			if (isset($tokens[2])) {
				$this->id = $tokens[2];
			}
		}
	}

	public function getAction() {
		return $this->action;
	}

	public function getCtrlName() {
		return $this->ctrl_name;
	}

	function getId() {
		return $this->id;
	}
}
