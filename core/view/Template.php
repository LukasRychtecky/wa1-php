<?php

class Template {

	protected $smarty;
	protected $vars = [];

	function __construct($smarty) {
		$this->smarty = $smarty;
	}

	function __set($key, $value) {
		$this->vars[$key] = $value;
	}

	function __get($key) {
		return $this->vars[$key];
	}

	function getSmarty() {
		return $this->smarty;
	}

	function display($tpl) {
		foreach ($this->vars as $k => $v) {
			$this->smarty->assign($k, $v);
		}
		$this->smarty->display($tpl);
	}
}
